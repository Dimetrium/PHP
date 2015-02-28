<?php
class Calc
{
  private $a;
  private $b;
  private $c;

  public function __construct()
  {
  }

  public function setA($a)
  {
    if ( !is_numeric($a))
    {
      return false;
    }
    else
    {
      $this->a = $a;
    }
  }

  public function setB($b)
  {
    if ( !is_numeric($b))
    {
      return false;
    }
    else
    {
      $this->b = $b;
    }
  }

  public function sum()
  {
    return $this->c = $this->a + $this->b;
  }


  public function sub()
  {
    return $this->a - $this->b;
  }

  public function mul()
  {
    return $this->a * $this->b;
  }

  public function div()
  {
    return $this->a / $this->b;
  }
}
