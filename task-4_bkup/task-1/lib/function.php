<?php

function upload(){
	$tmp = $_FILES['userfile']['tmp_name'];
	$name = $_FILES['userfile']['name'];
	move_uploaded_file($tmp, UPLOAD_DIR.$name);
	return true;
}