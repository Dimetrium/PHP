<!DOCTYPE html>
<html lang="ru">
<head>
	<title>GoogleParse</title>
</head>
<body>
  <form action="" method="post">
  Search: <input type="text", name="keyword">
  <button>Go!</button></form>
<?php
if(isset($res))
  {
    echo $res;
  }
else
  {
  $res = '';
  }
?>
</body>
</html>
