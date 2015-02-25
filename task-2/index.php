<?php
//phpinfo();
require_once 'config.php';
require_once LIB;

//init and print
$file = new Editor();

$textArray = $file->printFile();

/**
 * Get Selected Line 
 * Use '$selectedLine = ' in template
 * to display "Selected Line #.."
 **/ 
$getLine = $file->getLine($selectedLine = 3);

/**
 * Select char 
 * Use '$uselectCharLine, $selectCharPosition' in template
 * to display "Selected Char pos #.." /
 **/
$getChar = $file->getChar($selectCharLine = 3, $selectCharPosition = 10);

//replace line
$repLine = $file->replaceLine($getRepLine = 1, $replaceLine = 2);

//replace char
$repChar = $file->replaceChar($getCharLine = 0, $getCharNum = 5, $replacedChar = "K");

// Export changes to file 'output.txt' and print...
$file->exportFile();
$exportText = (array)$file->printExportFile();

require_once TEMPLATE;
?>
