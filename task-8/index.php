<?php
require_once('config.php');
function __autoload($class)
{
  include_once('lib/'.$class.'.php');
}
//require_once('lib/GooglPars.php');
if(isset($_POST['keyword']))
{
  $keyword = rawurlencode( $_POST['keyword']);
}  
else
{
  $keyword = '';
}
$res = new GooglePars($keyword);
var_dump($res);
include TEMPLATE;
