<?php
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

$mic = new Instrument('Shure', 'Microphone');
$john = new Musician('John Smith', 'Vocalist');
$john->addInstrument($mic);
$theband = new Band('The Band', 'Genre Style');
$theband->addMusician($john);
echo $theband->bandInfo();
