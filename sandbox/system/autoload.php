<?php
/**
 * Autoloads php classes specifically required for unit/functional testing
 * @version     $Id: autoload.php 40 2011-02-09 14:10:00Z biyi $
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

function autoload_required(){
  require_once ((phpversion() >= '5.3') ? __DIR__ : dirname(__FILE__)) . '/init.php'; 
}

spl_autoload_register('autoload_required');
