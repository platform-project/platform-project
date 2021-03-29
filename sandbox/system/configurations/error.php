<?php
/**
 *
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @version     $Id$
 * @copyright   2011 Entilda
 * @license     GNU Public Licence
 * @package   Platform
 * @category    Configurations
 */

ini_set('display_errors', 'off');

// Error Reporting
#error_reporting(0); // turns all error reporting off
error_reporting(E_ALL & E_NOTICE); // turns all error reporting and notices on

require_once LIBRARIES_PATH.'adodb/adodb-errorpear.inc.php';
require_once LIBRARIES_PATH.'adodb/tohtml.inc.php';
?>
