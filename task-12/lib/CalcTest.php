<?php
include('Calc.php');

class CalcTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->calc = new Calc();
  }

  public function testSum()
  {
   $this->calc->setA(5);
   $this->calc->setB(5);
   $this->assertEquals(10, $this->calc->sum()); 
  }

  public function testSub()
  {
    $this->calc->setA(10);
    $this->calc->setB(3);
    $this->assertEquals(7, $this->calc->sub());
  }

  public function testMul()
  {
    $this->calc->setA(5);
    $this->calc->setB(5);
    $this->assertEquals(25, $this->calc->mul(5, 5));
  }

  public function testDiv()
  {
    $this->calc->setA(25);
    $this->calc->setB(5);
    $this->assertEquals(5, $this->calc->div(25, 5));
  }

  public function tearDown()
  {
    unset($this->calc);
  }
}
