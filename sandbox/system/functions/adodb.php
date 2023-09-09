<?php
/**
 * This contains all the system-wide adodb functions
 * @version     $Id: adodb.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @subpackage  ADODB
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

function adodb_connect($dbtype, $dbhost, $dbuser, $dbpass, $dbname){
  switch ($dbtype)
  {
    case 'mysql':
    case 'postgresql':

      $connection = &ADONewConnection($dbtype);
      try {
        if ($connection->PConnect($dbhost, $dbuser, $dbpass, $dbname)) {
          return $connection;
        } else {
          throw new Exception ('<i>Database server is down.</i>');
        }
      }
      catch (Exception $e){
        // Remember to log exception instead of a die message
        echo ('<b>Caught an exception: </b>' . $e->getMessage());
      }
      break;

    case 'mssql':
      break;
    case 'oracle':
      break;
  }
}
?>
