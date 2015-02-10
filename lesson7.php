<?php
abstract class Demo
{
  private(protected) const DB_NAME = 'ABC'; //(по умалчанию паблик, но желательно закрывать) 
  protected $db;
  abstract public open($var);
  
}

class DemoChild extends Demo
{
    public function open($var, $var2, $var3 = false)
    {
      echo 'open';
    }
}
_____________________



