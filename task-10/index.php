<?php
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

try
{
  $mySql = new MyPdo;
}
catch(PDOException $e)
{
  echo "Error: ".$e->getMessage();
}
$my_select = $mySql
  ->setWhere('kay')
  ->setValue('2')
->commitQuery();

include VIEW;
?>
