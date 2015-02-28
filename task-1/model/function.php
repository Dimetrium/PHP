<?php 
function del( $fileName )
{
  unlink( $fileName );
  return true;
}

function sizeFile($size)
{
  if($size < 1000)
  {
    return number_format($size, 2) . "bite";
  }
  elseif($size < 1000*1024)
  {
    return number_format($size/1024, 2) . "Kb";
  }
  else
  {
    return number_format($size/1024/1024, 2) . "Mb";
  }
}

function upload( $file )
{
  $file = $_FILES['file']['name'];
  if ( file_exist( UPLOAD_DIR.'/'.basename( $file ))
  {
    return $error = "$file exist";
  }
  elseif (is_uploaded_file( $file )
  {
    move_uploaded_file($_FILES['tmp_name'], UPLOAD_DIR.'/'.basename( $file ) )
  }
}

}
?>
