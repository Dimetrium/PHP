<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<br><b>Band :</b> <?=$band?>
<br><b>Genre : </b> <?=$genre?>
<br><b>Band Members: </b>
<?php
foreach ( $musician as $mus )
{
  echo '<hr/>';
  foreach ( $mus as $kay=>$val )
  {
    echo '<br><b>'.$kay.' : </b>'.$val;
  }
}
?>
</body>
</html>
