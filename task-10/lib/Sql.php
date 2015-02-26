<?php
class Sql
{
  protected $value;
  protected $select;
  protected $errors;
  protected $from;
  protected $where;
  

  private function varCheck($var)
  {
    $var = htmlspecialchars((trim( strip_tags( $var ))));
    return $var;
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
  
  protected function setSelect($var)
   {
    $this->select = $this->varCheck($var);
    if(empty($this->select))
    {
      $this->errors .= 'Value can not be empty | ';
      return $this;
    }
    else
    {
      return $this;
    }
   }
  
  protected function setFrom($var)
   {
    $this->from = $this->varCheck($var);
    if(empty($this->from))
    {
      $this->errors .= 'Value can not be empty | ';
      return $this;
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
      $this->errors .= 'Value can not be empty | ';
      return $this;
    }
    else
    {
      return $this;
    }
   }
}
?>
