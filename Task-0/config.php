<?php
define('TITLE', 'Boooks Maggazzinn');	
define('DEFAULT', 'Boooks Maggazzinn');	
	
define('MYSQL_HOST', 'localhost');	
define('MYSQL_USER', 'root');	
define('MYSQL_PASS', '1qaz2wsx');	
define('MYSQL_DB_NAME', 'books');	

define('MODEL', 'model.php');	
define('CONTROLLER', 'controller.php');	
define('VIEW', 'template/');	
define('TEMPLATE', './template/default/');	

define('RCOLOR', '1');

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB_NAME);
?>