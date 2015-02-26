<?php

class Band implements iBand
{
  private $nameBand;
  private $genre;
  private $musician = array();
  public function __construct($nameBand, $genre){
    $this->nameBand = $nameBand;
    $this->genre = $genre;
  }
  
  public function getName()
  {
    return $this->nameBand;
  }
  
  public function getGenre()
  {
    return $this->genre;
  }
  
  public function addMusician(iMusician $obj)
  {
    $this->musician[] = $obj;
  }

  public function getMusician()
  {
    foreach ($this->musician as $item)
    {
      $musician[] = array(
        'Musician' => $item->getName(), 
        'Type' => $item->getMusicianType(), 
        'Instrument' => $item->getInstrument());
    }
    return $musician;
  }

}

