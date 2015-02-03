<?php
require_once "config.php";
require_once "FileHandler.php";

$handler = new FileHandler();
$lines = $handler->getLines();

$count = 1;
$oldLines = '';
foreach ($lines as $line) {
    $oldLines .= $count, '<br />' . $line, '<br />';
    $count++;
}

$handler->replaceChar(1,7,'t');
$handler->replaceChar(1, 'something');

$count = 1;
$lines = '';
foreach ($lines as $line) {
    $newLines .= $count, '<br />' . $line, '<br />';
    $count++;
}

$handler->write();
// echo $handler->find(1, 7);
