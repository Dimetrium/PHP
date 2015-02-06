<?php
class Sql
{
  protected $connect;
  protected $select;
  protected $insert;
  protected $delete;
  protected $selectQuery;
  public function __construct()
  {
    $this->connect;
    $this->select;
    $this->insert;
    $this->delete;
  }
  protected function select()
  {
    $this->selectQuery '';
    foreach($this->select as $key => $value)
    {
      $this->selectQuery .= $key.' ';
      $this->selectQuery .= $value.' ';
    }
    return true;
  }
  protected function insert()
  {
    $this->selectQuery '';
    foreach($this->insert as $key => $value)
    {
      $this->selectQuery .= $key.' ';
      $this->selectQuery .= $value.' ';
    }
    return true;
  }
  protected function insert()
  {
    $this->selectQuery '';
    foreach($this->insert as $key => $value)
    {
      $this->selectQuery .= $key.' ';
      $this->selectQuery .= $value.' ';
    }
    return true;
  }

  protected function delete()
  {
    $this->selectQuery '';
    foreach($this->delete as $key => $value)
    {
      $this->selectQuery .= $key.' ';
      $this->selectQuery .= $value.' ';
    }
    return true;
  }
  public function set(
?>
