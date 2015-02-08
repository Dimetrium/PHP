<?php
require_once( 'config.php' );
function __autoload( $class )
{
  require_once( 'lib/'.$class.'.php' );
}

//$data = new Cookies();
//$data->add( "cookaaa","cookkaa value" );
//$r = $data->read( "cookaaa" );  
//$data->remove( "cookaaa" );

$query = new MySql();
//$query->add( '4', 'John 4' );
//$query->add( '5', 'ivan 5' );
//echo $query->read( '4' );
//$query->remove( '4' );
