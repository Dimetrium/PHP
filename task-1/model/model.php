<?php
function upload( $file )
{
  global $state;
  $uploadDir = UPLOAD_DIR;
  for ( $i=0; $i < count( $_FILES['file']['name']); $i++)
  {
    $tmpFile = $_FILES['file']['tmp_name'][$i];
    $file = $uploadDir.$_FILES['file']['name'][$i];
    if ( file_exists( $file ))
    {
      $message = mess( 1 );
      $state = 'info';
      return $message; 
    }

    if ( move_uploaded_file( $tmpFile, $file ))
    { 
      $message = mess( 2 );
      $state = 'success';
    } 
    else
    {
      $message = mess( 3 );
      $state = 'danger';
      return $message; 
    }
  }
  return $message; 
}

function del( $file )
{
  global $state;
  if ( file_exists( UPLOAD_DIR.$file ))
  {
    if ( unlink( UPLOAD_DIR.$file ))
    {
      $message = mess( 4 );
      $state = 'success';
      return $message;
    }
    else
    {
      $message = mess( 5 );
      $state = 'danger';
      return $message;
    }
    return $message;
  }
  else
  {
    $message = mess( 7 );
    $state = 'info';
    return $message;
  }
}

function mess( $i )
{
  switch( $i )
  {
  case 1:
    $message = 'File exist!';
    break;
  case 2:
    $message = 'File upload success';
    break;
  case 3:
    $message = 'Error uploading file!';
    break;
  case 4:
    $message = 'File was removed success!';
    break;
  case 5:
    $message = 'Error removing file!';
  case 6:
    $message = 'Can not get file size';
  case 7:
    $message = 'File not exist!';
  }
  return $message;
}

function get_files_list()
{ 
  $list = '';
  $i = 0;
  $dir = opendir( UPLOAD_DIR );
  if ( count( $dir) > 0)
  {
    while ( false !== ( $file = readdir( $dir )))
    {
      if ( '.' !== $file && '..' !== $file )
      {
        $list[$i]['file'] = $file;
        $list[$i]['size'] = get_size( $file );     
        $i++;
      }
    }
    return $list ;
    closedir( $dir );
  }
  else
  {
    return false;
  }
}

function get_size( $file )
{
  global $state;
  if ( $size = filesize( UPLOAD_DIR.$file ))
  {
    if ( $size < 1024 ) $message = $size.' Bt';
    if ( $size > 1024 )
    {
      $size2 = round( $size / 1024,2 );
      $message = $size2.' Kb';
    }
  }
  else
  {
    $message = mess( 6 );
    $state = 'danger';
  }
  return $message;
}
