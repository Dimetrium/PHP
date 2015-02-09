<?php
require_once( 'config.php' );
function __autoload( $class )
{
  require_once( 'lib/'.$class.'.php' );
}

//$data = new Cookies();
//$data->add( 'cookaaa','cookkaa value' );
//$cook = $data->read( 'cookaaa' );  
//$data->remove( 'cookaaa' );
//echo $cook;
$query = new MySql();
//$query->add( '4', 'John 4' );
//$query->add( '5', 'ivan 5' );
echo $query->read( '5' );
$query->remove( '5' );
//$session = new Sessions();
//$session->add( '5', '5essTest');
//$session->add( '4', '4essTest');
//$session->add( '6', '6essTest');
//echo $session->read('4');
//echo $session->read('5');
//echo $session->read('6');
//$session->remove('4');
//echo $session->read('4');
//echo $session->read('5');
//echo $session->read('6');
