<?php
class MyPdo extends Sql
{
  protected $link;
  public function __construct()
  {
    $this->link = new PDO("mysql:host=".HOST.", dbname=".DB_NAME, USER, PASSWORD);
    $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function setWhere($var)
  {
    parent::setWhere($var);
    return $this;
  }
  public function setValue($var)
  {
    parent::seValue($var);
    return $this;
  }
  
  private function prepereQuery()
  {
    $stmt = $this->link->prepare("SELECT genre FROM Books WHERE :where = :value");
    $stmt->bindParam(':where', $this->where);
    $stmt->bindParam(':value', $this->value);
  }

  public function commitQuery()
  {
    $this->prepereQuery();
    $stmt->execute();
  }

}
