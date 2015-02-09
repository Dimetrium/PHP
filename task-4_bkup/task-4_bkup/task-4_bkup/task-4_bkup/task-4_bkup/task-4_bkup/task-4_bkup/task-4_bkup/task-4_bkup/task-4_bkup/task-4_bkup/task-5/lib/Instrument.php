<?php
class Instrument implements iInstrument
{
  private $instName;
  private $instCategory;
  public function __construct($instName, $instCategory)
  {
    $this->instName = $instName;
    $this->instCategory = $instCategory;    
  }

  public function getName()
  {
    return $this->instName;
  }
  public function getCategory()
  {
    return $this->instCategory;
  }
}  
