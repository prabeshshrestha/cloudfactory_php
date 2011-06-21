<?php
//assertContains assertTrue  assertFalse  AssertEquals  AssertNull  AssertRegExp
// Testing Requires PHPUnit
require_once 'PHPUnit/Framework.php';
require_once 'cloudFactory.php';
require_once 'Application.php';
require_once 'Line.php';
require_once 'Station.php';

class CloudFactoryTest extends PHPUnit_Framework_TestCase
{     
  public function setUp(){ }  
  public function tearDown(){ }

  public function testgetLinesisLineObject(){
    $cf = new CloudFactory();
    $lines = $cf->getLines();
    $this->assertGreaterThan(0,count($lines));
    $this->assertType('Line',$lines[0]);
  }

  public function testisLineObject(){
    $cf = new CloudFactory();
    $line = $cf->createLine("Line1","Other","Test Description1");
    $this->assertType('Line', $line); 
  }

}

?>

