<?php
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

try
{
  $mySql = new MyPdo;
  $my_select = $mySql
  ->setValue('3')
  ->commitQuery();
}
catch(PDOException $e)
{
  echo "Error: ".$e->getMessage();
}


include VIEW;
?>
