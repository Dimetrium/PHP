<?php
require_once('config.php');
function __autoload($class)
{
  include_once('lib/'.$class.'.php');
}

if(isset($_POST['keyword']))
{
  $keyword = rawurlencode( $_POST['keyword']);
  $html = new GooglePars($keyword);
  $res = $html->parsElements();
}  
else
{
  $keyword = '';
}
include TEMPLATE;
