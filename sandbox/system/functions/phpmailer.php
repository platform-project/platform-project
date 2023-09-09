<?php
/**
 * This contains all the system-wide phpmailer functions
 * @version     $Id: phpmailer.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Function
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */



function mail_send($subject, $body, $mail_to, $mail_from, $format=null, $copy_to=null, $attachment=null) {
  global $phpmailer;

  $phpmailer->Subject = $subject;
  $phpmailer->Body = $body;

  // set email format to HTML or PLAINTEXT
  switch ($format){
    case 'text' :  // disable HTML
      $phpmailer->IsHTML(false);
      break;
    case 'html' :
    default:
      $phpmailer->IsHTML(true);
      break;
  }

  if (!is_null($copy_to)){
    mail_copy_to($copy_to);
  } else {
    mail_to($mail_to);
  }

  if (!is_null($attachment)){
    mail_attachment($attachment);
  }
  $mail_send = $phpmailer->Send();
  $phpmailer->ClearAllRecipients();
  return $mail_send;
}

function mail_to($addresses) {
  global $phpmailer;
  if(is_array($addresses)) {
    foreach ($addresses AS $address) $phpmailer->AddAddress($address);
  } else {
    $address = $addresses;
    $phpmailer->AddAddress($address);
  }
}


function mail_copy_to($addresses) {
  global $phpmailer;
  if(is_array($addresses)) {
    foreach ($addresses AS $address) $phpmailer->AddCC($address);
  } else {
    $address = $addresses;
    $phpmailer->AddCC($address);
  }
}

function mail_attachment($attachments){
  global $phpmailer;
  if(is_array($attachments)) {
    foreach ($attachments AS $attachment) $phpmailer->AddAttachment($attachment);
  } else {
    $attachment = $attachments;
    $phpmailer->AddAttachment($attachment);
  }
}

function mail_debug($recipient='root@localhost', $sender='admin@localhost'){
  global $phpmailer, $mail_administrators;
  ob_start();
  mail_send('RapidWebSMS - Send Mail Test.', 'This is a test.', $recipient, $sender, 'html');
  return ob_get_clean();
}
