<?php
class MySql implements iDataWork
{
  //private $link;
  private $select;
  private $rez;
  public function __construct()
  {
    $link =  mysql_connect( HOST, USER, PASSWORD );
    mysql_select_db( DATA_BASE, $link );
  }

  public function add( $key, $val )
  {
    $query = "INSERT INTO ".TABLE." ( firstname, lastname ) VALUES ('".$key."', '".$val."');";
    mysql_query( $query );
    return true;
  }

  public function read( $key )
  {
    $query = "SELECT firstname, lastname  FROM ".TABLE." WHERE firstname=$key;";
   $this->select = mysql_query($query);
    while ( $row = mysql_fetch_array( $this->select, MYSQL_NUM ))
    { 
      // todo: put printing into controller....
      $this->rez = sprintf("FirstName: %s,<br> LastName: %s <br>", $row[0], $row[1]);

    } 
    mysql_free_result( $this->select );
    return $this->rez;
  }

  public function remove($key)
  {
    //TODO: create notification of delete...
    mysql_query("DELETE FROM ".TABLE." WHERE firstname=$key;");
    return true;
  }
}
