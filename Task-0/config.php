<?php
define('TITLE', 'Boooks Maggazzinn');	
define('DEFAULT', 'Boooks Maggazzinn');	
	
define('HOST', 'localhost');	
define('USER', 'root');	
define('PASS', '');	
define('DB_NAME', 'books');	

define('MODEL', 'model.php');	
define('CONTROLLER', 'controller.php');	
define('TEMPLATE', './template/');	

define('RCOLOR', '1');

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB_NAME);
?>
