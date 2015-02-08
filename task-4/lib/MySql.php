<?php
class MySql implements iDataWork
{
  private $link;
  private $select;
  private $rez;
  public function __construct()
  {
    $link =  mysql_connect( HOST, USER, PASSWORD );
    mysql_select_db( DATA_BASE, $link );
  }

  public function add( $key, $val )
  {
    $query = "INSERT INTO genre ( kay, genrename ) VALUES ('".$key."', '".$val."');";
    mysql_query( $query );
    return true;
  }

  public function read( $key )
  {
    $this->select = mysql_query("SELECT kay, genrename  FROM ".TABLE." WHERE kay=$key;");
    while ( $row =mysql_fetch_array( $this->select, MYSQL_NUM ))
    { 
      // TODO: put printing into controller....
      $this->rez = sprintf("KEY: %s,<br> VALUE: %s <br>", $row[0], $row[1]);

    } 
    mysql_free_result($this->select);
    return $this->rez;
  }

  public function remove($key)
  {
    //TODO: create notification of delete...
    mysql_query("DELETE FROM ".TABLE." WHERE kay=$key;");
    return true;
  }
}
