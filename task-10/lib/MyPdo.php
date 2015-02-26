<?php
class MyPdo extends Sql
{
  protected $link;
  public function __construct()
  {
    $this->link = new PDO(
      "mysql:host=".HOST.";
      dbname=".DB_NAME.";
      ", USER, PASSWORD);
    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function setValue( $var )
  {
    parent::setValue( $var );
    return $this;
  }
  
  public function setSelect( $var )
  {
    parent::setSelect( $var );
    return $this;  
  }
  
  public function setFrom( $var )
  {
    // $query .= "FROM '.$this->from.' "; 
    parent::setFrom( $var );
    return $this;  
  }
  
  public function setWhere( $var )
  {
    // $query .= "WHERE '.$this->where.' "; 
    parent::setWhere( $var );
    return $this;  
  }

  public function setQuery()
  {
    $query .= "SELECT $this->select ";
    return $this;
  }
  
  public function commitQuery()
  {
    $test = print_r($this, TRUE);
    var_dump($test);
    $stmt = $this->link->prepare( $this->setQuery() );
    $stmt->bindParam(':value', $this->value);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rez = $stmt->fetch();
   return $rez;

  }

}
