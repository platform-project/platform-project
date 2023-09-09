<?php
/**
 * This contains all database specific functions
 * @version     $Id: database.php 40 2011-02-09 14:10:00Z biyi $
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

function database(){

}

/**
 * Retrives data from the database based on the parameters passed
 * @param $query The select query to run. Can be a string or, for more
 *               flexibility, an array.
 * @return mixed An array with the data. False on error.
 */
function db_data_query_fetch($query) {
  $result = db_query($query);

  if(!is_resource($result)) {
    return false;
  } else {
    $data = array();
    $row = mysql_fetch_assoc($result);
    while ($row !== false) {
      array_push($data, $row);
      $row = mysql_fetch_assoc($result);

    }
    return $data;
  }
}

/**
 * Fetches the columns in a specific table.
 * @param string $table The table to be inspected.
 */
function db_table_fields($table) {
  return db_data_query_fetch("SHOW COLUMNS FROM " . $table . "");
}

/**
 * Fetches the names tables in the database.
 */
function db_tables() {
  return db_col("SHOW TABLES");
}

/**
 * Wrapper function to query MySQL database
 * @param $query The query to send.
 * @return The response return by the database
 * @see mysql_query
 */
function db_query($query) {
  global $debug, $query_log;
  $query_log = empty($query_log) ? array() : $query_log;
  array_push($query_log, $query);
  $result = mysql_query($query, db_connection_mysql());

  if ((bool)mysql_errno(mysql_db_connection())) {
    $msg = 'Error communicating with database. ' . "\n";
    $msg .= !empty($debug) ? mysql_error(db_connection_mysql()) ."\nquery: ". $query : '';
    trigger_error($msg, E_USER_WARNING );
    return false;
  } else if($debug) {
    return $result;
  }
}

/**
 * Uses the home class to create a connection to the database if one does
 * not already exist.
 * @return The existing or newly created databse connection.
 */
function db_connection_mysql() {
  $db_name = '';
  $db_host = '';
  $db_user = '';
  $db_pass = '';

  //global $dbe_conn, $db_name, $db_host, $db_user, $db_pass;

  if(empty($dbe_conn)) {
    $dbe_conn = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_name, $dbe_conn);
  }

  return $dbe_conn;
}

function db_col($query, $col_num=0) {
  $data = db_data_query_fetch($query);
  $data = array_map('array_map_flatten', $data);

  return $data;
}

function db_select($table, $where=null, $start=null, $limit=null){
  $where_clause = is_null($where) ? null : " WHERE {$where}";
  $start = ($start == 0) ? null : ", {$start}";
  $limit_clause = is_null($start) && is_null($limit) ? null : " LIMIT {$limit} $start";
  $query = "SELECT * FROM {$table} {$where_clause} {$limit_clause}";
  return db_data_query_fetch($query);
}


function db_create_sqlite($database_file){
  $db = sqlite_open($database_file);
  return $db;
}

function db_create_table_sqlite($table, $structure, &$db){
  $c = 0;
  $data_string = "";
  foreach ($structure as $key => $data) {
    if (!$c){
      $primary_key_string = " PRIMARY KEY ($key)";
    }
    $data_string .= "$key $data,";
    $c++;
  }
  $structure_string = $data_string . $primary_key_string;
  return sqlite_query($db, "CREATE TABLE $table ($structure_string)");
}

function db_query_sqlite($query, &$db){
  return sqlite_fetch_array(sqlite_query($db, $query), null);
}

function db_insert_sqlite($table, $columns, $values, &$db){
  $column_part = array_to_string($columns);
  $value_part = array_to_quoted_string($values);
  return db_query_sqlite("INSERT INTO $table ($column_part) VALUES ($value_part);");
}

if(!function_exists('sqlite_open')) {
  function sqlite_open($location,$mode=null) { 
    $handle = new SQLite3($location); 
    return $handle; 
  } 
}

if(!function_exists('sqlite_query')) {
  function sqlite_query($dbhandle,$query) { 
    $array['dbhandle'] = $dbhandle; 
    $array['query'] = $query; 
    $result = $dbhandle->query($query); 
    return $result; 
  } 
}

if(!function_exists('sqlite_fetch_array')) {
  function sqlite_fetch_array(&$result,$type) { 
    #Get Columns 
    $i = 0; 
    while ($result->columnName($i)) { 
      $columns[ ] = $result->columnName($i); 
      $i++; 
    } 
    $resx = $result->fetchArray(SQLITE3_ASSOC); 
    return $resx; 
  } 
}

if(!function_exists('sqlite_escape_string')) {
  function sqlite_escape_string($string) { 
    return SQLite3::escapeString($string); 
  } 
}