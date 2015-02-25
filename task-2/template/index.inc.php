<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <p>Full File</p>
  <hr/>
<?php
  foreach ($textArray as $line_num => $textline) 
  {
    echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
  }
?>
  <hr>Selected Line #<b><?=$selectedLine?></b> : <?=$getLine?>
  <br>
  <hr>Selected Char position <b><?=$selectCharPosition + 1;?></b>, 
      char is 
      <b><?=$getChar?></b> 
      at line #
      <b><?=$selectCharLine?></b>
  <br>
  <hr>Replace Line <b><?=$getRepLine?></b> to <b><?=$replaceLine?></b> :<br>
<?php
  foreach ($repLine as $line_num => $textline) 
  {
    echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
  }
?>
  <hr>Replaced Char at Line <b><?=$getCharLine?></b>, 
      from pos. <b><?=$getCharNum?></b> 
      to <b><?=$replacedChar?></b><br>
<?php
  foreach ($repChar as $line_num => $textline) 
  {
    echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
  }
?>
  <p><hr><b>Output file whit changes</b><br></p>
<?php
  foreach ($exportText as $line_num => $textline) 
  {
    echo "Line #<b>{$line_num}</b> : " .$textline. "<br />\n";
  }
?>
</body>
</html>
