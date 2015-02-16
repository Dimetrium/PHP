<?php
class Sql
{
  protected $value;
  protected $errors;

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
}
?>
