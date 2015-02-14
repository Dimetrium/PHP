<?php
include ('config.php');
function __autoload($class)
{
  include('libs/'.$class.'.php');
}
try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






