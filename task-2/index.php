<?php
//phpinfo();
require_once 'config.php';
require_once LIB;
//init and print
$file = new Editor();

//Select line
$selectedLine = 3;

//Select char
$selectCharLine = 3;
$selectCharPosition = 10;

//replace line
$getRepLine = 1;
$replaceLine = 2;

//replace char
$getCharLine = 0;
$getCharNum = 5;
$replacedChar = "K";


require_once TMPLT;

$file->exportFile();

?>