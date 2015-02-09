<?php
require_once MODEL;

$qGenre = genreMenu();

if(!$_GET['show']){
  

require_once TEMPLATE.'index.inc.php';
