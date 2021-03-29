<?php
/**
 * This contains all date specific functions
 * @version     $Id: date.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Function
 * @author      Platform
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

function _date(){

}

/**
 * Implementation of helper function ago() that displays how many secs, mins, hrs,
 * days or weeks ago a $timestamp has elapsed
 */
function date_ago($timestamp){
  $difference = time() - $timestamp;

  if($difference < 60)
    return $difference." seconds ago";
  else {
    $difference = round($difference / 60);
    if($difference < 60)
      return $difference." minutes ago";
    else {
      $difference = round($difference / 60);
      if($difference < 24)
        return $difference." hours ago";
      else {
        $difference = round($difference / 24);
        if($difference < 7)
          return $difference." days ago";
        else {
          $difference = round($difference / 7);
          return $difference." weeks ago";
        }
      }
    }
  }
}

function date_local_timezone()
{
    $i_time = time();
    $arr = localtime($i_time);
    $arr[5] += 1900;
    $arr[4]++;
    $i_tztime = gmmktime($arr[2], $arr[1], $arr[0], $arr[4], $arr[3], $arr[5], $arr[8]);
    $offset = doubleval(($i_tztime-$i_time)/(60*60));
    $zonelist =
    array
    (
        'Kwajalein' => -12.00,
        'Pacific/Midway' => -11.00,
        'Pacific/Honolulu' => -10.00,
        'America/Anchorage' => -9.00,
        'America/Los_Angeles' => -8.00,
        'America/Denver' => -7.00,
        'America/Tegucigalpa' => -6.00,
        'America/New_York' => -5.00,
        'America/Caracas' => -4.30,
        'America/Halifax' => -4.00,
        'America/St_Johns' => -3.30,
        'America/Argentina/Buenos_Aires' => -3.00,
        'America/Sao_Paulo' => -3.00,
        'Atlantic/South_Georgia' => -2.00,
        'Atlantic/Azores' => -1.00,
        'Europe/Dublin' => 0,
        'Europe/Belgrade' => 1.00,
        'Europe/Minsk' => 2.00,
        'Asia/Kuwait' => 3.00,
        'Asia/Tehran' => 3.30,
        'Asia/Muscat' => 4.00,
        'Asia/Yekaterinburg' => 5.00,
        'Asia/Kolkata' => 5.30,
        'Asia/Katmandu' => 5.45,
        'Asia/Dhaka' => 6.00,
        'Asia/Rangoon' => 6.30,
        'Asia/Krasnoyarsk' => 7.00,
        'Asia/Brunei' => 8.00,
        'Asia/Seoul' => 9.00,
        'Australia/Darwin' => 9.30,
        'Australia/Canberra' => 10.00,
        'Asia/Magadan' => 11.00,
        'Pacific/Fiji' => 12.00,
        'Pacific/Tongatapu' => 13.00
    );
    $index = array_keys($zonelist, $offset);
    if(sizeof($index)!=1)
        return false;
    return $index[0];
}

// compute the days between two dates
function date_difference($date1, $date2) {
  //$date1  today, or any other day
  //$date2  date to check against

  $d1 = explode("-", $date1);
  $y1 = $d1[0];
  $m1 = $d1[1];
  $d1 = $d1[2];

  $d2 = explode("-", $date2);
  $y2 = $d2[0];
  $m2 = $d2[1];
  $d2 = $d2[2];

  $date1_set = mktime(0,0,0, $m1, $d1, $y1);
  $date2_set = mktime(0,0,0, $m2, $d2, $y2);

  return(round(($date2_set-$date1_set)/(60*60*24)));
}

function date_from_apache($date)
{
   list($d, $M, $y, $h, $m, $s, $z) = sscanf($date, "[%2d/%3s/%4d:%2d:%2d:%2d %5s]");
   return strtotime("$d $M $y $h:$m:$s $z");
}

function date_difference_unix($interval, $datefrom, $dateto, $using_timestamps = false) {
  /*
  $interval can be:
  yyyy - Number of full years
  q - Number of full quarters
  m - Number of full months
  y - Difference between day numbers
  (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
  d - Number of full days
  w - Number of full weekdays
  ww - Number of full weeks
  h - Number of full hours
  n - Number of full minutes
  s - Number of full seconds (default)
  */

  if (!$using_timestamps) {
    $datefrom = strtotime($datefrom, 0);
    $dateto = strtotime($dateto, 0);
  }
  $difference = $dateto - $datefrom; // Difference in seconds

  switch($interval) {

    case 'yyyy': // Number of full years

    $years_difference = floor($difference / 31536000);
    if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
      $years_difference--;
    }
    if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
      $years_difference++;
    }
    $datediff = $years_difference;
    break;

    case "q": // Number of full quarters

    $quarters_difference = floor($difference / 8035200);
    while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
      $months_difference++;
    }
    $quarters_difference--;
    $datediff = $quarters_difference;
    break;

    case "m": // Number of full months

    $months_difference = floor($difference / 2678400);
    while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
      $months_difference++;
    }
    $months_difference--;
    $datediff = $months_difference;
    break;

    case 'y': // Difference between day numbers

    $datediff = date("z", $dateto) - date("z", $datefrom);
    break;

    case "d": // Number of full days

    $datediff = floor($difference / 86400);
    break;

    case "w": // Number of full weekdays

    $days_difference = floor($difference / 86400);
    $weeks_difference = floor($days_difference / 7); // Complete weeks
    $first_day = date("w", $datefrom);
    $days_remainder = floor($days_difference % 7);
    $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
    if ($odd_days > 7) { // Sunday
      $days_remainder--;
    }
    if ($odd_days > 6) { // Saturday
      $days_remainder--;
    }
    $datediff = ($weeks_difference * 5) + $days_remainder;
    break;

    case "ww": // Number of full weeks

    $datediff = floor($difference / 604800);
    break;

    case "h": // Number of full hours

    $datediff = floor($difference / 3600);
    break;

    case "n": // Number of full minutes

    $datediff = floor($difference / 60);
    break;

    default: // Number of full seconds (default)

    $datediff = $difference;
    break;
  }

  return $datediff;

}