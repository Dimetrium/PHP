<?php
class Sql
{
  protected $value;
  protected $bindValue;
  protected $select;
  protected $query;
  protected $errors;
  protected $from;
  protected $where;
  protected $link;

  public function __construct()
  {
    $this->link = new PDO(
      "mysql:host=".HOST.";
    dbname=".DB_NAME.";
    ", USER, PASSWORD);
    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  private function varCheck($var)
  {
    $var = htmlspecialchars((trim( strip_tags( $var ))));
    return $var;
  }
  
  public function setValue($var)
  {
    $this->value = $this->varCheck($var);
    
    // If value is set, in sql query add ":value" key for binding params. 
    if ( empty( $this->value ))
    {
      $this->bindValue = NULL;
    }
    else
    { 
      $this->bindValue = ':value';
    }

    return $this;
  }

  public function setSelect($var)
  {
    $this->select = "SELECT ".$this->varCheck($var);
    if(empty($this->select))
    {
      throw new Exception("Select expression can not be empty.");
    }
    else
    {
      return $this;
    }
  }

  public function setFrom($var)
  {
    $this->from = " FROM ".$this->varCheck($var);
    if(empty($this->from))
    {
      throw new Exception("From can not be empty.");
    }
    else
    {
      return $this;
    }
  }

public function setWhere($var)
  {
    $this->where = $this->varCheck($var);
    if ( empty( $this->where ))
    {
      $this->where = NULL;
    }
    else
    { 
      $this->where = " WHERE ".$this->where;
    }
    return $this;
  }

  private function setQuery()
  {
    return 
      "$this->select".
      "$this->from".
      "$this->where".
      "$this->value";
  }

  public function commitQuery()
  {
    $stmt = $this->link->prepare( $this->setQuery() );
    
    if ( isset( $this->value ))
    {
      $stmt->bindParam(':value', $this->value);
    }
    
    $stmt->execute();
    
    $rez = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rez;


  }
}
?>
