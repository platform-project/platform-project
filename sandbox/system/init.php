<?php
/**
 * Initializes  platform sandbox system variables
 * @version     $Id: init.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    PHP
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - 2012 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

$page_init = microtime();
$page_load = 0;
$paths = array();
$platform = null;
define('PHPVERSION',                 phpversion());
define('OBJECT', 			         'object');       # user intervention required (default: object)
define('STDLIB', 			         'stdlib');       # user intervention required (default: stdlib)
define('IS_CLI', 			         PHP_SAPI === 'cli' && defined('STDIN')); 
define('HOST',                       IS_CLI ? @shell_exec('/bin/hostname --fqdn') : @$_SERVER['SERVER_NAME']);
define('APP_ENGINE', 		         IS_CLI ? OBJECT : STDLIB);
define('NEW_LINE',                   '\n');
define('LOCAL_ADMIN_EMAIL',          'root@platform');
define('PLATFORM_ENGINE', 	         APP_ENGINE);
define('PLATFORM_SERVER', 	         HOST);
define('PLATFORM_HOST', 	         HOST);
define('PLATFORM_WHOIS',            '80.68.95.151'); # use whois service to get static server ip
define('PLATFORM_VENDORS_OPENDDR',  'openddr');
require_once ((PHPVERSION >= '5.3') ? __DIR__ : dirname(__FILE__)) . '/path.php';
require_once ((PHPVERSION >= '5.3') ? __DIR__ : dirname(__FILE__)) . '/uri.php';
require_once ((PHPVERSION >= '5.3') ? __DIR__ : dirname(__FILE__)) . '/bootstrap.php';