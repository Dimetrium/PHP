<?php
class PgSql extends Sql
{
  private $link;
  function __construct(){
    if(false === TEST_MODE)
    {
      $this->link = pg_connect('host='.HOST.', port=5432, dbname='.DB_NAME.','.USER.', user password='.PASSWORD);
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
      $res = mssql_query($result);
      $res = mssql_fetch_assoc($res);
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
      $res = mssql_query($result);
      $res = mssql_fetch_assoc($res);
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
      $res = mssql_query($result);
      $res = mssql_fetch_assoc($res);
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
      $res = mssql_query($result);
      $res = mssql_fetch_assoc($res);
      return print_r($res);
    }
  }
  function __destruct()
  {
    if (false === TEST_MODE)
      pg_close($this->link);
  }
}
?>
