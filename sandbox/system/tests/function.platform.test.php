<?php
/**
 * PlatformFunctionTest class for unit testing the platform functions 
 * in functions/platform.php
 * @package       PHPUnit
 * @subpackage    Platform
 * @author        Platform <platform@entilda.com>
 * @copyright     2013 The Platform Authors
 * @link          http://platform.entilda.com
 */
class PlatformFunctionTest extends PHPUnit\Framework\TestCase
{
  /**
   * @access protected
   * @var object
   */
  protected $platform;

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
  public function test_platform() : void {
    $this->assertTrue(function_exists('platform'));
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