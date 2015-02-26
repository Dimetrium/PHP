<?php
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

// Create new Band, Musician and instrument
$theband = new Band('The Band', 'Genre Style');

$john = new Musician('John Smith', 'Vocalist');
$rick = new Musician('Rick Smith', 'Guitar');

$mic = new Instrument('Shure', 'Microphone');
$guitar = new Instrument('WoodLand', 'Acustic Guitar');

// Add instrument to Musician
$john->addInstrument($mic);
$rick->addInstrument($guitar);

// Assign Musician to band
$theband->addMusician($john);
$theband->addMusician($rick);

// Get Band Info
$band = $theband->getName();
$genre = $theband->getGenre();
$musician = $theband->getMusician();

require_once TEMPLATE;
