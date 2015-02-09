<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task-4</title>
</head>
<body>
<p>Cookie print: </p>
<?=$cook;?><br>
<p>MySQL print data: </p>
<?=$query->read( '5' );?><br>
<p>Session Print: </p>
<?=$session->read( '4' );?>
</body>
</html>
