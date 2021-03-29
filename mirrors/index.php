<?php
/**
 * Loads the platform mirrors index page
 * @version     $Id: error.php 40 2011-02-09 14:10:00Z biyi $
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

# initilizing platform
platform_launch_initialize();
//benchmark_view();


if (isset($_POST['submit']) || isset($_GET['domain'])){
  if (isset($_POST['submit'])){
    extract($_POST);
  }

  if (isset($_GET['domain'])){
    extract($_GET);
  }

  if (!empty($domain)){
    exec(PLATFORM_MIRRORS_PATH . DS . "get.sh $domain", $output, $return_value);
  }
}

if (isset($_GET['html'])) {
?>
<form method="post" action="index.php">
<strong>DOMAIN:</strong> <input id="domain" name="domain" style="border: 1px solid black" /> <input id="submit" name="submit" type="submit" value="GET" /> e.g. myweblog.com
<br />
<?php if (isset($domain)){ echo '<a href="'.dirname($_SERVER['PHP_SELF']).'/'.$domain.'">'.$domain.'</a>'; } ?>
<?php

}
