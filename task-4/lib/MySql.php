<?php
class MySql implements iDataWork
{
  private $select;
  private $rez;
  public function __construct()
  {
    $link =  mysql_connect( HOST, USER, PASSWORD );
    mysql_select_db( DATA_BASE, $link );
  }

  public function add( $key, $val )
  {
    if ( NULL == $this->read($key) )
    {
      $query = "INSERT INTO ".TABLE." ( id, name ) VALUES ('".$key."', '".$val."');";
      mysql_query( $query );
      return true;
    }
    else
    {
      die("ID $key exist");
    }
  }

  public function read( $key )
  {
    $query = "SELECT id, name  FROM ".TABLE." WHERE id=$key;";
    $this->select = mysql_query($query);
    while ( $row = mysql_fetch_array( $this->select, MYSQL_NUM ))
    { 
      $this->rez = sprintf( "ID: %s<br> Name: %s <br>", $row[0], $row[1] );
    } 
    mysql_free_result( $this->select );
    return $this->rez;
  }

  public function remove($key)
  {
    mysql_query( "DELETE FROM ".TABLE." WHERE id=$key;" );
    return true;
  }
}
