<?php
include 'config.php';
include 'functions.php';
$display = display();
$dir = opendir(DIR_DEST);
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $var = upload();
}
if(isset($_GET['name']))
{
  $file = $_GET['name'];
  $file_del = DIR_DEST . $file;
  if($var = del($file_del))
  {
    $var;
  }
  else
  {
    $var = "Access denided";
  }
}

include VIEW;
?>
