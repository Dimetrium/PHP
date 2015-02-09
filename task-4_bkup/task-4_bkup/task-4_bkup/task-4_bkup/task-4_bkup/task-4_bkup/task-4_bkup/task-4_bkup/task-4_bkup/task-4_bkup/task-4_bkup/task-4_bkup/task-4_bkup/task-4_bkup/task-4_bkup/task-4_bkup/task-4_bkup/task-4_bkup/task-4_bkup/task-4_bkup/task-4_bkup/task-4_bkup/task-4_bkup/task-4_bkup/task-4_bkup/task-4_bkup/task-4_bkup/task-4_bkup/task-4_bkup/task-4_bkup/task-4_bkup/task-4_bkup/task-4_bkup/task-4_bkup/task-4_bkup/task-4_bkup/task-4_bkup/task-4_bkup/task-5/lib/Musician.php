<?php
class Musician implements iMusician
{
  private $mname;
  private $setType;
  private $instruments;
  public function __construct($mname, $setType)
  {
    $this->mname = $mname;
    $this->setType = $setType;
  }

  public function addInstrument(iInstrument $obj)
  {
    $this->instrument[] = $obj;
  }
  public function getInstrument()
  {
    foreach ($this->instrument as $value)
    {
      $instrument[] = $value->getName() . '('. $value->getCategory() . ')';
    }
    return $instrument = implode ("<br>" , $instrument);
  }
  public function assingToBand(iBand $nameBand)
  {
      $nameBand->addMusician($this);
  }
  public function getMusicianType()
  {
   return $this->setType;
  }
  public function getName()
  {
   return $this->mname;
  }
}
