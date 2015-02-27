<?php
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

try
{
  $mySql = new Sql;
  $my_select = $mySql
  ->setSelect('id, name')
  ->setFrom('TableA')
  ->setWhere('id =')
  ->setValue('3')
  ->commitQuery();
  
  include VIEW;
}
catch(PDOException $e)
{
  echo "PDO Error: ".$e->getMessage();
}

catch(Exception $e)
{
  echo "Error: ".$e->getMessage();
}

?>
