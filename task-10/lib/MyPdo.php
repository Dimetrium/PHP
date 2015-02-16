<?php
class MyPdo extends Sql
{
  protected $link;
  public function __construct()
  {
    $this->link = new PDO("mysql:host=".HOST.";dbname=".DB_NAME.";", USER, PASSWORD);
    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function setValue($var)
  {
    parent::setValue($var);
    return $this;
  }
  
  public function commitQuery()
  {
    $stmt = $this->link->prepare("SELECT genrename FROM genre WHERE kay = :value");
    $stmt->bindParam(':value', $this->value);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rez = $stmt->fetch();
   return $rez;

  }

}
