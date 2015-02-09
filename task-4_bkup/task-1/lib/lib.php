<?php

function UploadFile(){
	$tmp = $_FILES['userfile']['tmp_name'];
	$fname = $_FILES['userfile']['name'];
	move_uploaded_file($tmp, UPLOAD_DIR.$fname);
	return true;
}

function DelFile($fname)
{
$dirdata= scandir(UPLOAD_DIR);
		$files=array();
		$i=1;
		foreach ($dirdata as $key => $element)
		{
			if (!is_dir($element))
			{
				
				if ($i==$del)
				{
					$link=UPLOAD_DIR."$element";
					unlink($link);
					return true;
				}
				$i++;
			}
			
		}
		return false;
}

function fileS()
{
	$fsize = filesize(UPLOAD_DIR.$fname);
			if ($fsize>1024)
		{
			$fsize=round($size/1024).'KB';
		}
		else 
		{
			$fsize.='B';
		}
		return $fsize;
	
}

function genreTable()
	{
		$uploadDir= scandir(UPLOAD_DIR);
		$files=array();
		for($i=0; $i<count($uploadDir); $i++)
		{
			$element=$uploadDir[$i];
			if (!is_dir($element))
			{
				$name=$element;
				$size=FileSize(UPLOAD_DIR."$element");
				$files[$element]=$size;
			
			}
		}
		return $files;
	}