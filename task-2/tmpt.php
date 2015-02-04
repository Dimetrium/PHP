<?php
//prin full file 
$textArray = $file->printFile();
foreach ($textArray as $line_num => $textline) 
{
echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
}

//Print selected line 
$getLine = $file->getLine($selectedLine);
echo "<br><hr>Selected Line #<b>{$selectedLine}</b> : {$getLine}<br />\n";

//get char 
$getChar = $file->getChar($selectCharLine, $selectCharPosition);
$selCharPos = $selectCharPosition + 1;
echo "<br><hr>Selected Char ({$selCharPos}) <b>{$getChar}</b> on line #<b>{$selectCharLine}</b><br>\n";

//replace line
$reLine = $file->replaceLine($getRepLine, $replaceLine);
echo "<hr><br>Replace Line <b>{$getRepLine}</b> to <b>{$replaceLine}</b> :<br>";
foreach ($reLine as $line_num => $textline) 
{
echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
}

//replace char
$repChar = $file->replaceChar($getCharLine, $getCharNum, $replacedChar);
echo "<hr><br>Replace Char at Line <b>{$getCharLine}</b>, pos. <b>{$getCharNum}</b> to <b>{$replacedChar}</b> :<br>";
foreach ($repChar as $line_num => $textline) 
{
echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
}

//print output.txt file
$exporText = (array)$file->printExportFile();
echo "<hr><br><b>Print Output File</b><br>";
foreach ($exporText as $line_num => $textline) 
{
echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
}

?>