<?php
/**
 * <test_name> test
 * Test case:   This is a <test_name> test file
 *
 * @version     $Id: index.php {REVISION} 2017-11-28_08h26m58s biyi $
 * @package     Platform
 * @category    Tests
 * @author      Platform
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 - 2017 The Platform Authors. All rights reserved.
 * @license     GNU Public Licence, see LICENSE.md
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.md for copyright notices and details.
 */

// initilizing platform for self-contained objects
platform_launch_initialize();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="description" content="Studio">
    <meta name="author" content="The Platform Authors">
    <title>Studio</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,regular,bold&subset=Latin" />
    <link rel="stylesheet" type="text/css" href="./assets/css/app.css" />
    <?php js_add_jquery(); ?>
  </head>
  <body style="background: url(assets/images/background-apps.png) center no-repeat; margin: 0px; width: 100%; height: 100%;">
    <div class="contents" style="background: transparent url(assets/images/background-apps.png) center no-repeat; margin: 0px; width: 100%; height: 100%;">
      <p>&nbsp;</p>
    </div>
    <footer>
      <div id="app">
        <span class="logo image" style="background: transparent url('<?php echo image_data_uri("assets/images/icons/iphone.png", "png"); ?>') no-repeat;"></span>
        <span class="logo text">Studio<sup style="font-size: 12px">TM</sup</span>
      </div>
    </footer>
    <?php js_add('assets/js/app.js'); ?>
  </body>
</html>
