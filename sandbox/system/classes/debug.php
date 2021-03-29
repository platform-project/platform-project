<?php
/**
 * This contains all the system-wide debug functions
 *
 * @version     $Id: debug.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
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
class Debug {
		
	function __construct( $option=null, $state='off' ) {
		global $smarty;

		switch ( $state ) {
			case 1: case 'on':
				ob_start();
				switch ( $option ) {
				case 'os':        os_info(); break;
				case 'browser':   browser_info(); break;
				case 'session':   session_info(); break;
				case 'server':    server_info(); break;
				case 'request':   request_info(); break;
				case 'class':     class_info(); break;
				case 'includes':  includes_info(); break;
				case 'mail':      mail_info(); break;
				case 'system':
				default:          system_info(); break;
				}
				$output = ob_get_clean();
				$smarty->assign( 'output', $output );
				$smarty->display( DEBUG_PATH . 'debug.phtml' );
				break;
			case 0: case 'off':
			default:

				break;
		}
	}

	function _exit($message='') {
		exit($message);
	}

	function log( $message ) {
		error_log( sys_log( $message, 'debug' ) );
	}

	function php( $status=0 ) {
		switch ( $status ) {
		case 0:
			error_reporting( $status );
			break;
		case 1:
			error_reporting( E_ALL | E_STRICT );
			ini_set( "display", $status );
			break;
		default:
			$this->php( 0 );
			break;
		}
	}

	function lite_stack( $variable ) {
		print( '<pre>' );
		debug_print_backtrace();
		var_dump( $variable );
		print( '</pre>' );
	}

	function complete_stack( $variables ) {
		print( '<pre>' );
		debug_print_backtrace();
		if ( is_array( $variables ) ) {
			foreach ( $variables as $variable ) {
				var_export( $variable );
			}
		} else {
			var_export( $variables );
		}
		var_export( get_included_files() );
		var_export( get_include_path() );
		print( '</pre>' );
	}


	function default_stack( $var, $bool=true ) {
		if ( !$bool ) {
			print( '<pre>' );
			if ( is_array( $var ) ) {
				pr( $var );
			}else {
				print( $var );
			}
			print( '</pre>' );
		}
	}

	function print_array( $array=array() ) {
		print( "<pre>" );
		if ( is_array( $array ) ) {
			foreach ( $array as $key => $val ) {
				print( "$key: $val\n" );
			}
		}
		print( "</pre>" );
	}

	function system_info() {
		$this->os_info();
		$this->browser_info();
		$this->session_info();
		$this->server_info();
		$this->request_info();
		$this->class_info();
		$this->includes_info();
		$this->mail_info();
	}

	function os_info() {
		backtrace( detect_os(), 'p', 'OS type' );
	}

	function browser_info() {
		backtrace( detect_browser(), 'p', 'Browser' );
	}

	function session_info() {
		backtrace( $_SESSION, 'e', 'Session' );
	}

	function server_info() {
		backtrace( $_SERVER, 'e', 'Server' );
	}

	function mail_info() {
		global $phpmailer;
		backtrace( mail_debug( LOCAL_ADMIN_EMAIL ), 'p', 'EMail' );
		backtrace( $phpmailer, 'e', 'PHPMailer::Object' );
	}

	function request_info() {
		backtrace( $_REQUEST, 'e', 'HTTP Request' );
	}

	function class_info() {
		backtrace( get_declared_classes(), 'd', 'Classes' );
	}

	function includes_info() {
		backtrace( get_included_files(), 'e', 'Include files' );
	}

	function backtrace( $output, $format='p', $title=null ) {
		global $smarty;
		ob_start();
		print( '<pre>' );
		switch ( $format ) {
		case 'e': var_export( $output ); break;
		case 'd': var_dump( $output ); break;
		case 'p': print( $output ); break;
		case 'pr': print_r( $output ); break;
		}
		print( '</pre>' );
		$html = ob_get_clean();
		$smarty->assign( 'title', $title );
		$smarty->assign( 'html', $html );
		$smarty->display( DEBUG_PATH . '_debug.phtml' );
	}

	function __destruct() {
		//register_shutdown_function( 'debug_print_array' );
	}

}
