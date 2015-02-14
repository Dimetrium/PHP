<?php 
function del($name)
{
  global $file;
  if(is_writable($name))
  {
    unlink($name);
    return "File $file deleted";
  }
  else
  {
    return "Access denied to file $file";
  }
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

function upload()
{
  global $name;
  global $tmp_name;
  if(file_exists(DIR) && $name!='')
  {
   return "The file $name already uploaded!";
  }
  else
  {
    if(move_uploaded_file($tmp_name, DIR))
    {
      return "File upload successful!";
    }
    else
    {
      return "File not uploaded";
    }
  }
}
function display()
{
  $files = scandir(DIR_DEST);
  array_shift($files);
  array_shift($files);
  if(empty($files))
  {
    $display='style="display: none;"';
    return $display;
  }
  else
  {
    $display='';
    return $display;
  }
}
?>
