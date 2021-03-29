<?php
/**
 * Initializes  platform sandbox system variables
 * @version     $Id: path.php 40 2011-02-09 14:10:00Z biyi $
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
global $paths;
$paths = array();
define('DS',  '/');
define('CDS', '.');
define('PDS', '..');

// defining server paths
define('SERVER_BASE_PATH',      DS);                                            # for URLs
define('BASE_PATH',             ((phpversion() >= '5.3') ? __DIR__ : dirname(__FILE__)) . DS. PDS. DS . PDS. DS); 
define('APPLICATION_BASE_PATH', BASE_PATH);

// defining platform paths
define('PLATFORM_BASE_PATH',              APPLICATION_BASE_PATH);
define('PLATFORM_PATH',                   APPLICATION_BASE_PATH);
define('PLATFORM_MIRRORS_PATH',           APPLICATION_BASE_PATH . DS . 'mirrors');
define('PLATFORM_NETWORKS_PATH',          APPLICATION_BASE_PATH . DS . 'networks');
define('PLATFORM_SANDBOX_PATH',           APPLICATION_BASE_PATH . DS . 'sandbox');
define('PLATFORM_SERVERS_PATH',           APPLICATION_BASE_PATH . DS . 'servers');
define('PLATFORM_SITES_PATH',             APPLICATION_BASE_PATH . DS . 'sites');
define('PLATFORM_SITES_ICONS_PATH',       APPLICATION_BASE_PATH . DS . 'icons');
define('PLATFORM_SITES_IMAGES_PATH',      APPLICATION_BASE_PATH . DS . 'images');

// defining platform sandbox paths
define('PLATFORM_SANDBOX_FRAMEWORK_PATH',   PLATFORM_SANDBOX_PATH . DS . 'framework');
define('PLATFORM_SANDBOX_LIBRARY_PATH',     PLATFORM_SANDBOX_PATH . DS . 'library');
define('PLATFORM_SANDBOX_REPOSITORY_PATH',  PLATFORM_SANDBOX_PATH . DS . 'repository');
define('PLATFORM_SANDBOX_SYSTEM_PATH',      PLATFORM_SANDBOX_PATH . DS . 'system');
define('PLATFORM_SANDBOX_WORKSPACE_PATH',   PLATFORM_SANDBOX_PATH . DS . 'workspace');

// defining platform sandbox system paths
define('PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_PATH', PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'applications');
define('PLATFORM_SANDBOX_SYSTEM_CACHES_PATH',       PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'caches');
define('PLATFORM_SANDBOX_SYSTEM_CLASSES_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'classes');
define('PLATFORM_SANDBOX_SYSTEM_COMPONENTS_PATH',   PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'components');
define('PLATFORM_SANDBOX_SYSTEM_CONFIGS_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'configs');
define('PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH',    PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'functions');
define('PLATFORM_SANDBOX_SYSTEM_LANGUAGES_PATH',    PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'languages');
define('PLATFORM_SANDBOX_SYSTEM_LOGS_PATH',         PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'logs');
define('PLATFORM_SANDBOX_SYSTEM_MODULES_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'modules');
define('PLATFORM_SANDBOX_SYSTEM_PACKAGES_PATH',     PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'packages');
define('PLATFORM_SANDBOX_SYSTEM_PLATFORMS_PATH',    PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'platforms');
define('PLATFORM_SANDBOX_SYSTEM_PLUGINS_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'plugins');
define('PLATFORM_SANDBOX_SYSTEM_SCRIPTS_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'scripts');
define('PLATFORM_SANDBOX_SYSTEM_STRUCTS_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'structs');
define('PLATFORM_SANDBOX_SYSTEM_TEMPLATES_PATH',    PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'templates');
//define('PLATFORM_SANDBOX_SYSTEM_TESTS_PATH',    		PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'tests');
define('PLATFORM_SANDBOX_SYSTEM_TOOLS_PATH',        PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'tools');
define('PLATFORM_SANDBOX_SYSTEM_VENDORS_PATH',      PLATFORM_SANDBOX_SYSTEM_PATH . DS . 'vendors');

// defining platform sandbox system function paths
define('PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PSEUDO_PATH',   PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH . DS . 'pseudo');

$platform_paths = array(
  'networks'      => PLATFORM_NETWORKS_PATH,
  'sandbox'       => PLATFORM_SANDBOX_PATH,
  'servers'       => PLATFORM_SERVERS_PATH,
  'sites'         => PLATFORM_SITES_PATH,
  'mirrors'       => PLATFORM_MIRRORS_PATH,
);

$sandbox_paths = array(
  'framework'     => PLATFORM_SANDBOX_FRAMEWORK_PATH,
  'library'       => PLATFORM_SANDBOX_LIBRARY_PATH,
  'repository'    => PLATFORM_SANDBOX_REPOSITORY_PATH,
  'system'        => PLATFORM_SANDBOX_SYSTEM_PATH,
  'workspace'     => PLATFORM_SANDBOX_WORKSPACE_PATH,
);

$system_paths = array(
  'caches'        => PLATFORM_SANDBOX_SYSTEM_CACHES_PATH,
  'classes'       => PLATFORM_SANDBOX_SYSTEM_CLASSES_PATH,
  'components'    => PLATFORM_SANDBOX_SYSTEM_COMPONENTS_PATH,
  //'configurations'        => PLATFORM_SANDBOX_SYSTEM_CONFIGURATIONS_PATH,
  'functions'     => PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PATH,
  //'languages'      => PLATFORM_SANDBOX_SYSTEM_LANGUAGES_PATH,
  'logs'          => PLATFORM_SANDBOX_SYSTEM_LOGS_PATH,
  'modules'       => PLATFORM_SANDBOX_SYSTEM_MODULES_PATH,
  'plugins'       => PLATFORM_SANDBOX_SYSTEM_PLUGINS_PATH,
  'scripts'       => PLATFORM_SANDBOX_SYSTEM_SCRIPTS_PATH,
  'structs'       => PLATFORM_SANDBOX_SYSTEM_STRUCTS_PATH,
  'templates'     => PLATFORM_SANDBOX_SYSTEM_TEMPLATES_PATH,
  //'tests' 				=> PLATFORM_SANDBOX_SYSTEM_TESTS_PATH,
  'tools'         => PLATFORM_SANDBOX_SYSTEM_TOOLS_PATH,
  'vendors'       => PLATFORM_SANDBOX_SYSTEM_VENDORS_PATH,
);

$functions_paths = array(
  'pseudo'        => PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PSEUDO_PATH,
);

// NOTE: currently allowing global visiblity on platform, sandbox and system paths
$paths = array_merge($platform_paths, $paths);
$paths = array_merge($sandbox_paths, $paths);
$paths = array_merge($system_paths, $paths);
$paths = array_merge($functions_paths, $paths);