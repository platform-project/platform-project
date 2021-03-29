<?php
/**
 * Initializes  platform sandbox system variables
 * @version     $Id: uri.php 40 2011-02-09 14:10:00Z biyi $
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

define('HTTP_URI',  'http://');
define('HTTPS_URI', 'https://');

// defining platform uris
define('PLATFORM_BASE_URI',               HTTP_URI . HOST);
define('PLATFORM_URI',                    PLATFORM_BASE_URI . DS . '');
define('PLATFORM_MIRRORS_URI',            PLATFORM_BASE_URI . DS . 'mirrors');
define('PLATFORM_NETWORKS_URI',           PLATFORM_BASE_URI . DS . 'networks');
define('PLATFORM_SANDBOX_URI',            PLATFORM_BASE_URI . DS . 'sandbox');
define('PLATFORM_SERVERS_URI',            PLATFORM_BASE_URI . DS . 'servers');
define('PLATFORM_SITES_URI',              PLATFORM_BASE_URI . DS . 'sites');
define('PLATFORM_SITES_ICONS_URI',        PLATFORM_SITES_URI . DS . 'icons');
define('PLATFORM_SITES_IMAGES_URI' ,      PLATFORM_SITES_URI . DS . 'images');

// defining platform sandbox uris
define('PLATFORM_SANDBOX_FRAMEWORK_URI',    PLATFORM_SANDBOX_URI . DS . 'framework');
define('PLATFORM_SANDBOX_LIBRARY_URI',      PLATFORM_SANDBOX_URI . DS . 'library');
define('PLATFORM_SANDBOX_REPOSITORY_URI',   PLATFORM_SANDBOX_URI . DS . 'repository');
define('PLATFORM_SANDBOX_SYSTEM_URI',       PLATFORM_SANDBOX_URI . DS . 'system');
define('PLATFORM_SANDBOX_WORKSPACE_URI',    PLATFORM_SANDBOX_URI . DS . 'workspace');

// defining platform sandbox system uris
define('PLATFORM_SANDBOX_SYSTEM_APPLICATIONS_URI',    PLATFORM_SANDBOX_SYSTEM_URI . DS . 'applications');
define('PLATFORM_SANDBOX_SYSTEM_CACHES_URI',          PLATFORM_SANDBOX_SYSTEM_URI . DS . 'caches');
define('PLATFORM_SANDBOX_SYSTEM_CLASSES_URI',         PLATFORM_SANDBOX_SYSTEM_URI . DS . 'classes');
define('PLATFORM_SANDBOX_SYSTEM_COMPONENTS_URI',      PLATFORM_SANDBOX_SYSTEM_URI . DS . 'components');
define('PLATFORM_SANDBOX_SYSTEM_CONFIGURATIONS_URI',  PLATFORM_SANDBOX_SYSTEM_URI . DS . 'configuations');
define('PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_URI',       PLATFORM_SANDBOX_SYSTEM_URI . DS . 'functions');
define('PLATFORM_SANDBOX_SYSTEM_LANGUAGES_URI',       PLATFORM_SANDBOX_SYSTEM_URI . DS . 'languages');
define('PLATFORM_SANDBOX_SYSTEM_LOGS_URI',            PLATFORM_SANDBOX_SYSTEM_URI . DS . 'logs');
define('PLATFORM_SANDBOX_SYSTEM_MODULES_URI',         PLATFORM_SANDBOX_SYSTEM_URI . DS . 'modules');
define('PLATFORM_SANDBOX_SYSTEM_PACKAGES_URI',        PLATFORM_SANDBOX_SYSTEM_URI . DS . 'packages');
define('PLATFORM_SANDBOX_SYSTEM_PLATFORMS_URI',       PLATFORM_SANDBOX_SYSTEM_URI . DS . 'platforms');
define('PLATFORM_SANDBOX_SYSTEM_PLUGINS_URI',         PLATFORM_SANDBOX_SYSTEM_URI . DS . 'plugins');
define('PLATFORM_SANDBOX_SYSTEM_SCRIPTS_URI',         PLATFORM_SANDBOX_SYSTEM_URI . DS . 'scripts');
define('PLATFORM_SANDBOX_SYSTEM_STRUCTS_URI',         PLATFORM_SANDBOX_SYSTEM_URI . DS . 'structs');
define('PLATFORM_SANDBOX_SYSTEM_TEMPLATES_URI',       PLATFORM_SANDBOX_SYSTEM_URI . DS . 'templates');
define('PLATFORM_SANDBOX_SYSTEM_TESTS_URI',    				PLATFORM_SANDBOX_SYSTEM_URI . DS . 'tests');
define('PLATFORM_SANDBOX_SYSTEM_TOOLS_URI',           PLATFORM_SANDBOX_SYSTEM_URI . DS . 'tools');
define('PLATFORM_SANDBOX_SYSTEM_VENDORS_URI',         PLATFORM_SANDBOX_SYSTEM_URI . DS . 'vendors');

define('PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_PSEUDO_URI',    PLATFORM_SANDBOX_SYSTEM_FUNCTIONS_URI . DS . 'pseudo');
