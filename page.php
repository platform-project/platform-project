<?php
/**
 * Loads the iframe browser page
 * @version     $Id: page.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @subpackage  System
 * @category    Application
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

global $url;

$url = 'http://'.$_SERVER['HTTP_HOST'].'/?platform';
$request = isset($_GET['request']) ? $_GET['request'] : $url;


$xml = @file_get_contents($request);
$cache = 'cache.html';

$f = fopen($cache, 'w+');
fwrite($f, $xml);
fclose($f);
header('X-Frame-Options: Allow-From http://www.yahoo.com');
header('X-Frame-Options: Allow-From http://www.bing.com');
header('X-Frame-Options: Allow-From http://www.google.com');
header('X-Frame-Options: Allow-From http://www.facebook.com');
header('X-Frame-Options: Allow-From http://www.stackoverflow.com');
header('X-Frame-Options: GOFORIT');
if (PHPVERSION >= '5.3'){
	header_remove('X-Frame-Options');
}
//var_dump(get_headers($url));
echo $xml;
