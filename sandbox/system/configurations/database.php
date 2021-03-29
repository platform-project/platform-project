<?php
/**
 *
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @version     $Id$
 * @copyright   2011 Entilda  
 * @license     GNU Public Licence
 * @package 	Platform
 * @subpackage 	ADODB
 * @category    Configurations
 */

define( 'DBHOSTNAME',   DEV_HOST_DOMAIN  ); // change to host e.g. use '168.172.24.252'
define( 'DBUSERNAME',   'username'        );
define( 'DBPASSWORD',   'paassword'     );
define( 'DBTYPE',       'mysql'       );
define( 'DBNAME',       'database'  );
define( 'DSN',          'Driver={SQL Server};Server='.DBHOSTNAME.';Database='.DBNAME.';');
?>
