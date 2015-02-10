<?php
abstract class Demo
{
  const DB_NAME = 'ABC'; 
  public static $flag;
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
___________________________________________________________________
singlTone

class Demo
{
  private static $inst;
  public static function run()
  {
    if ( self::$inst === null ) //first time running?
    {
      self::$inst = new Demo();
    }
    return self::$inst;
  }
  
  private function __construct()
  {
    mysql_connect()
  }
}

$obj = Demo::run();


________________________________________________________________

Task-9
--------------------------------
Шаблонизатор....

HtmlHelper::
  select() // create selecte;
  table() // forming table
