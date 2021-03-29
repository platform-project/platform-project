<?php
/**
 * DatabaseFunctionTest class for unit testing the database functions
 * in functions/database.php
 * @package       PHPUnit
 * @subpackage    Platform
 * @author        Platform <platform@entilda.com>
 * @copyright     2013 The Platform Authors
 * @link          http://platform.entilda.com
 */
class DatabaseFunctionTest extends PHPUnit\Framework\TestCase
{
  /**
   * @access protected
   * @var object
   */
  protected $database;

  /**
   * sets up the unit test class <similar to a constructor>
   * @param void
   * @return void
   */
  public function setUp() : void {
    parent::setUp();
  }

  /**
   * tests that the object instance is instantiated for the platform class
   * @param void
   * @return void
   */
  public function test_database() : void {
    $this->assertTrue(function_exists('database'));
  }

  /**
   * tests that the object instance is instantiated for the platform class
   * @param void
   * @return void
   */
  public function test_sqlite_escape_string() : void {
    $string = "SELECT * FROM test WHERE 1 '";
    $this->assertTrue(function_exists('sqlite_escape_string'));
    $this->assertEquals(sqlite_escape_string($string), str_replace("'", "''", $string));
  }


  /**
   * cleans up resources initialize in the setUp stage of the unit test
   * class <similar to a destructor>
   * @param void
   * @return void
   */
  public function tearDown() : void {
    parent::tearDown();
  }

}