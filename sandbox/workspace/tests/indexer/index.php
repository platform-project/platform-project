<?php
/**
 * Indexing files using UNIX-based find commandline program
 * Test case: Determine the optimal use of indexers for full-text search
 *
 * @version     $Id: index.php 40 2011-02-09 14:10:00Z biyi $
 * @package     Platform
 * @category    Tests
 * @author      The Platform Authors
 * @link        mailto:platform@entilda.com
 * @copyright   Copyright (C) 2011 The Platform Authors. All rights reserved.
 * @license     GNU/GPL, see LICENSE.php
 * Platform is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// initilizing platform for self-contained objects
platform_launch_initialize();

//e("PLATFORM_INDEXER::LOAD<br/>", true);
e('<div class="content">');

$indexes = PLATFORM_SANDBOX_SYSTEM_CACHES_PATH . DS . "indexes.db";

$found = 0;

$files = find_all($_REQUEST['search'], APPLICATION_BASE_PATH);

$threshold = 216000;

if (count($files)){

  e('<h3>Found ' . count($files) . ' files</h3>');

  if (count($files) > $threshold){

    e('Updating index...');
    update_index();

  }


  foreach($files as $file){

    if ($found < 10){

      $uri_array = explode(APPLICATION_BASE_PATH, $file);
      $file_url = $uri_array[1];
      e('&nbsp;&nbsp;&nbsp;&nbsp;<a href="' . $file_url . '">' .
           basename($file) . "</a><br />");

    } else {

      e('<br /><br /><a href="#">View more results...</a>');
      break;

    }
    ++$found;

  }

} else {

  e("No results found for search criteria " . $_REQUEST['search']);

}

e('</div>');

/*

USING: recoll indexer


TODO: Solr indexer


TODO: SQL lite indexer
if (!file_exists($indexer)) {
  db_create_sqlite($indexer);
  $table = "indexes";
  $structure = array (
    'id' => "INTEGER",
    'files' => "VARCHAR"
  );
  db_create_table_sqlite($table, $structure);
}


// DEBUGS
//e ("PLAFORM_DEBUGGER::LOAD<br/>", true);
//e(platform_launch_back_paths(), true);
//e(APPLICATION_BASE_PATH, true);
//var_export
*/


