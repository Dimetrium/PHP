<?php
function __autoload($class)
{
  include str_replace('\\', '/',$class.'.php');
}

//include 'lib/classa/Spacename.php';
//include 'lib/classb/Spacename.php';

$classa = new lib\classa\Spacename();
$classb = new lib\classb\Spacename();


