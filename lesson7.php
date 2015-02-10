<?php (http://php.net/manual/ru/language.oop5.static.php)
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
singlTone (http://habrahabr.ru/post/31375/)

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
(http://myrusakov.ru/php-template.html, http://twig.kron0s.com/, 
http://www.codenet.ru/webmast/php/Templater.php, 
http://maxsite.org/page/shablonizator-ili-formatirovanyj-php-i-html-vyvod-v-maxsite-cms
http://www.cyberforum.ru/php-beginners/thread579423.html
https://www.youtube.com/watch?v=FVRI_1E9y4Q
http://webew.ru/articles/3609.webew
http://amdy.su/own-templater/)

HtmlHelper::
  select() // create selecte;
  table() // forming table
