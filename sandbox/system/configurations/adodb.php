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
 
require_once 'global.php';
require_once 'database.php';
global $log;

switch (DBTYPE)
{
	case 'mysql':
	case 'postgresql':
	
		include_once LIBRARIES_PATH.'adodb/adodb.inc.php';
		
		try {
			$adodb = &ADONewConnection(DBTYPE);
			$adodb->PConnect(DBHOSTNAME, DBUSERNAME, DBPASSWORD, DBNAME);
		} catch (Exception $e){
			adodb_backtrace($e->gettrace());
			$log->error ('Database server is down. Please check the database configuration setup!', 'database');
		}
		break;

	case 'mssql':
		break;
	case 'oracle':
		break;
	default:
		$log->error('Unknown database type. Please check the database configuration setup!', 'database');
		break;
}
