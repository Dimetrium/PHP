<!DOCTYPE html>
<html lang="ru">
<head>
	<title>GoogleParse</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
  <div class="row">
  <div class="col-md-8">
  	<form action="" method="post">
  	Search: <input type="text", name="keyword">
  	<button>Go!</button></form>
<?php
  if (isset($res))
  	{
  	  echo $res;
  	}
  	else
  	{
  	$res = '';
  	}
?>	
  </div>
  </div>
  </div>
</body>
</html>
