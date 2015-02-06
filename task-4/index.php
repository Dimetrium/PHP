<?php
require_once('config.php');
function __autoload($class){
  require_once('lib/'.$class.'.php');}

$data = new Cookies();
$data->add("cookaaa","cookkaa value");
$r = $data->read("cookaaa");  
$data->remove("cookaaa");

$query = new MySql();
$query->add('John', 'Smith');
echo $query->read('John');

