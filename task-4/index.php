<?php
require_once( 'config.php' );
function __autoload( $class )
{
  require_once( 'lib/'.$class.'.php' );
}

$data = new Cookies();
$data->add( 'cookaaa','cookkaa value' );
$cook = $data->read( 'cookaaa' );  

$query = new MySql();
$query->add( '5', 'ivan 5' );

$session = new Sessions();
$session->add( '4', '4essTest');

include TEMPLATE;

$data->remove( 'cookaaa' );
$query->remove( '5' );
$session->remove('4');
