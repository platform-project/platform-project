<?php
/**
 * Initializes  platform sandbox system router
 * @version     $Id: router.php 40 2011-02-09 14:10:00Z biyi $
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

$route = parse_url(substr($_SERVER["REQUEST_URI"], 1))["path"];
switch (is_file($route)) {
	case true :
	    if(substr($route, -4) == ".php"){
	        require $route;         // Include requested script files
	        exit;
	    }
	    return false;               // Serve file as is
	    break;
	case false :
	default:
    // Fallback to index.php
    $_GET["q"] = $route;        // Try to emulate the behaviour of your htaccess here, if needed
    
}