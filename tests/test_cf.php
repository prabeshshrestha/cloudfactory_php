<?php
//assertContains assertTrue  assertFalse  AssertEquals  AssertNull  AssertRegExp
// Testing Requires PHPUnit
require_once 'PHPUnit/Framework.php';
require_once '/Users/sts-158imac/Sites/cloudfactory_php/lib/cloudFactory.php';

class CloudFactoryTest extends PHPUnit_Framework_TestCase
{ 
  protected static $cf; 

  public function setUp(){ }  
  public function tearDown(){ }


  public static function setUpBeforeClass()
  {
    self::$cf = new CloudFactory();
  }

  /**
   * @test
   * @group line
   * @covers CloudFactory::getLines
   * Getlines function should return the array of Lines Object
   */
  public function getLinesReturnsLineObjectArray(){
    $lines   = self::$cf->getLines();
    $this->assertGreaterThan(0,count($lines));
    $this->assertType('Line',$lines[0]);
  }
}
?>

