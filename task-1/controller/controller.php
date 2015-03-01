<?php
$message = '';
$result = '';
$state = '';
$list[] = '';

if ( isset( $_POST['upload'] ))
{
  $file = $_FILES['file']['name'];
  $message = upload( $file );
}

if ( isset( $_GET['del_file'] ))
{
  $file = $_GET['del_file'];
  $message = del( $file );
}

$list = get_files_list();
if ( count( $list ) > 0 && $list !== '')
{
    $result .= "<tr>
  	      <th>#</th>
  	      <th>File Name</th>
  	      <th>Size</th>
  	      <th>Delete</th>
  	    </tr>
  	  </thead>
  	  <tbody>";
  for ( $i = 0; $i < count( $list ); $i++ )
  {
    $result .= '<tr><td>'.$i.'</td><td>'.$list[$i]['file'].'</td><td>'.$list[$i]['size'].'</td><td><a href="?del_file='.$list[$i]['file'].'">DELETE</a></td></tr>';
  }
}
else
{
  $result = '';
}

include 'view/index.php';
