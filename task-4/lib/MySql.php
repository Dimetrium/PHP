<?php
class MySql implements iDataWork
{
  private $select;
  public function __construc()
  {
    mysql_connect(HOST, USER, PASSWORD);
    mysql_select_db(DATA_BASE);
    $this->select = $select;
  }

  public function add($key, $val)
  {
  $rrr = "INSERT INTO test (col1, col2) VALUES ('".$key."', '".$val."');";
  mysql_query($rrr);
   var_dump($rrr);
   return true;
  }

  public function read($key)
  {
    $this->select = mysql_query("SELECT $key FROM ".TABLE." WHERE firstname=$key;");
    return $this->select;
  }

  public function remove($key)
  {
    mysql_query("DELETE FROM ".TABLE." WHERE firstname=$key;");
    return true;
  }
}
