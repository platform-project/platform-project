<?php
/**
 *
 * @author      Biyi Akinpelu
 * @link        mailto:biyi@entilda.com
 * @version     $Id$
 * @copyright   2011 Entilda  
 * @license     GNU Public Licence
 * @package 	Platform
 * @category    Configurations
 */

define ('MAILER_PATH', CLASS_PATH . 'provider/mailer/');

define ('ADMIN_EMAIL', 'admin@rapidwebsms.co.za');
define ('SUPPORT_EMAIL', 'support@rapidwebsms.co.za');
define ('ACCOUNT_EMAIL', 'account@rapidwebsms.co.za');


// PHP Mailer Loader
$phpversion = phpversion();
$php = $phpversion[0];

switch ($php) {
	case 4:
		require_once MAILER_PATH . 'php4mailer.php';
		break;
	case 5:
		require_once MAILER_PATH . 'php5mailer.php';
		break;
}
