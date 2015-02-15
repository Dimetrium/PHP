<?php
class Sql
{
  protected $query;
  protected $table;
  protected $column;
  protected $where;
  protected $value;
  protected $connect;
  protected $errors;

  private function varCheck($var)
  {
    $var = htmlspecialchars((trim( strip_tags( $var ))));
    return $var;
  }
  
  
  protected function setTable($var)
  {
    $this->table = $this->varCheck($var);
    if(empty($this->table))
    {
      $this->errors .= 'Table can not be empty | ';
    }
    else
    {
      return $this;
    }
  }

  protected function setColumn($var)
  {
    $this->column = $this->varCheck($var);
    if('*' == $this->column || empty($this->column))
    {
      $this->errors .= 'Symbol "*" for bidden, field must be specified! | ';
    }
    else
    {
      return $this;
    }
  }
  
  protected function setWhere($var)
  {
    $this->where = $this->varCheck($var);
    if(empty($this->where))
    {
      $this->errors .= 'Where can not be empty | ';
    }
    else
    {
      return $this;
    }
  }

  protected function setValue($var)
  {
    $this->value = $this->varCheck($var);
    if(empty($this->value))
    {
      $this->errors .= 'Value can not be empty | ';
      return $this;
    }
    else
    {
      return $this;
    }
  }

  protected function selectQuery()
  {
    $col = $this->column;
    $table = $this->table;
    $where = $this->where;
    $value = $this->value;
    if( true == $this->errors)
    {
      $err = $this->errors;
      $this->errors = NULL;
      return $err;
    }
    else
    {
      return "SELECT $col FROM $table WHERE $where = $value;";
    }
  }
  
}
?>
