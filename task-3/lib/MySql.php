<?php
class MySql extends Sql
{
  function __construct(){
    if(TEST_MODE === false)
    {
      mysql_connect(HOST, USER, PASSWORD);
      mysql_select_db(DB_NAME);
    }
    else return true;
  }

  public function setWhere($var)
  {
    parent::setWhere($var);
    return $this;
  }
  public function setColumn($var)
  {
    parent::setColumn($var);
    return $this;
  }
  public function setValue($var)
  {
    parent::setValue($var);
    return $this;
  }
  public function setTable($var)
  {
    parent::setTable($var);
    return $this;
  }
  
  public function selectQuery()
  {
    $result = parent::selectQuery();
    if (true == $result)
    {
      return "Class: ".__Class__.
        ": METHOD :".__Method__.
        ": Query : $result";
    }
    else
    {
      $res = mysql_query($result);
      $res = mysql_fetch_assoc($res);
      return print_r($res);
    }
  }
  public function insertQuery()
  {
    $result = parent::insertQuery();
    if (true == $result)
    {
      return "Class: ".__Class__.
        ": METHOD :".__Method__.
        ": Query : $result";
    }
    else
    {
      $res = mysql_query($result);
      $res = mysql_fetch_assoc($res);
      return print_r($res);
    }
  }
  public function updateQuery()
  {
    $result = parent::updateQuery();
    if (true == $result)
    {
      return "Class: ".__Class__.
        ": METHOD :".__Method__.
        ": Query : $result";
    }
    else
    {
      $res = mysql_query($result);
      $res = mysql_fetch_assoc($res);
      return print_r($res);
    }
  }
  public function deleteQuery()
  {
    $result = parent::deleteQuery();
    if (true == $result)
    {
      return "Class: ".__Class__.
        ": METHOD :".__Method__.
        ": Query : $result";
    }
    else
    {
      $res = mysql_query($result);
      $res = mysql_fetch_assoc($res);
      return print_r($res);
    }
  }
  function __destruct()
  {
    if (false === TEST_MODE)
      mysql_close();
  }
}
?>
