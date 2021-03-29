<?php
/**
 * PlatformTest class for unit testing the Platform class
 * @package       PHPUnit
 * @subpackage    Platform
 * @author        Platform <platform@entilda.com>
 * @copyright     2013 The Platform Authors
 * @link          http://platform.entilda.com
 */
class PlatformTest extends PHPUnit\Framework\TestCase
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
  protected function setUp() : void {
    parent::setUp();
    $this->platform = new Platform();
  }

  /**
   * tests that the object instance is instantiated for the platform class
   * @param void
   * @return void
   */
  public function test_object_instance() : void {
    $this->assertInstanceOf('Platform', $this->platform);
  }


  /**
   * cleans up resources initialize in the setUp stage of the unit test
   * class <similar to a destructor>
   * @param void
   * @return void
   */
  public function tearDown() : void {
    unset($this->platform);
  }

}