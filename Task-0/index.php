<?php
require_once('config.php');
require_once LIB;

$getShow = $_GET['show'];
if ( isset( $getShow ) )
{
  $dropDownGenre = getGenreMenu();
  $tableRow = getTableRow();
  $view = 'content';
}
else 
{
  $view = 'default';
}

include TEMPLATE;
