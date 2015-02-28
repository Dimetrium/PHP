<?php
include('Calc.php');

class ClassTest extends PHPUnit_Framework_TestCase
{
  public function setUp()
  {
    $this->calc = new Calc();
  }

  public function testSum()
  {
   $this->assertEquals(10, $this->calc->mul(3, 7)); 
  }

  public function testSub()
  {
    $this->assertEquals(7, $this->calc->sub(10, 3));
  }

  public function testMul()
  {
    $this->assertEquals(25, $this->mul(5, 5));
  }

  public function testDiv()
  {
    $this->assertEquals(5, $this->div(25, 5));
  }

  public function tearDown()
  {
    unset($this->calc);
  }
}
