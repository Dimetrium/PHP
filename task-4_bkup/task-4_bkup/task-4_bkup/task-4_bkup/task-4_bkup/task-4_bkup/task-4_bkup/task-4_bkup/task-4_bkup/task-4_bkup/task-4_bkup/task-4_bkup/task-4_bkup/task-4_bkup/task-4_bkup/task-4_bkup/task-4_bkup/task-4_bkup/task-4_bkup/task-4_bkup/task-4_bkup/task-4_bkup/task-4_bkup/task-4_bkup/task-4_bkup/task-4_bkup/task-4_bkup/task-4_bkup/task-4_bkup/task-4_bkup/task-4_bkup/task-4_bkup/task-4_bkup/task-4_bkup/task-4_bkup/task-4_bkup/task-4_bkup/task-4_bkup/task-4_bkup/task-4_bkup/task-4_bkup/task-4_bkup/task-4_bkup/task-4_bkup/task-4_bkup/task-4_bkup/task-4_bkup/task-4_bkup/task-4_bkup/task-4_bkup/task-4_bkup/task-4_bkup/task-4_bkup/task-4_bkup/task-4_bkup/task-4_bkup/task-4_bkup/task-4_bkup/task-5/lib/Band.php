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
      $musician[] = $item->getName().'<br>type: '.$item->getMusicianType().'<br>'.$item->getInstrument().'<br>';
    }
    return $musician = implode("<br/>", $musician);
  }

  public function bandInfo()
  {  
    $str = 'Band: '.$this->getName().'<br>';
    $str.= 'Genre: '.$this->getGenre().'<br><br>';
    $str.= 'Musician: '.$this->getMusician() .'<br><br>';
    return $str;
  }
}

