<?php
require_once('config.php');
function __autoload($class)
{
  include_once('lib/'.$class.'.php');
}
//require_once('lib/GooglPars.php');

$res = new GooglePars($_POST['keyword']);
var_dump($res->getHtml);
include TEMPLATE;
