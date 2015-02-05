<?php //именуем интерфейсы с маленькой буквы i (iOpentable, iHumans)
interface iOpenable
{ //методі только паблик, тк как создані что бі візіват ьих из вне
  public function open();
  public function close();
}

//применяем интерфейск к классу Demo (можно наследовать множество интерфейсов (только интерфейсов))
class Demo implements iOpenable, iShop, iUniversal
{
  public function open()
  {
    echo 'open';
  }
  
  public function close()
  {
    echo 'close';
  }
}

(Пример 2)
class Bottle implements iOpenable
{
    public function open()
  {
    echo 'open';
  }
  
  public function close()
  {
    echo 'close';
  }
}


//функция внекласса

function open(Demo $obj)
{
  $obj->open(); //это разнаменованая(?) ссылка 
}

$obj1 = new Demo();
$obj2 = new Bottle();
$obj3 = new Test();

Open($obj1);
Open($obj2);
Open($obj3);

-----------------
$obj->open();
$obj->open()->getOpen()->testOpen();
----------------

class Test
{
  private $db;
  
  public function __consruct()
  {
    $this->bd = new MySql(); //создаём обьект другого класса MySql()
  }
  
  public function getDb()
  {
    return $this->db;
  }
}

$obj = new Test();
echo $obj->getDb()->select($sql);//используем метод select($sql) из класса MySql() в обьектах созданных с класса Тест.
echo $obj->getDb()->update($sql);//используем метод update($sql) из класса MySql() в обьектах созданных с класса Тест.

//________пример 2________-
class Test
{
  private $db;
  private $where;
  private $field;
  private $table;
  
  public function __consruct()
  {
    $this->bd = ''; //создаём обьект другого класса MySql()
  }
  
  public function setWhere($where)
  {
    $this->where = $where;
    return $this;
  }
    public function setField($field)
  {
    $this->fiel = $fiel;
    return $this;
  }
    public function setTable($table)
  {
    $this->table = $table;
    return $this;
  }
  public function getSelect()
  {
    return 'Select '.$this->field.' from '.$this->table.' where '.$this->where
  }
  public function getDb()
  {
    return $this->db;
  }  
}

$obj = new Test();
echo $obj->selectField('id, name, summa')->setTable('ORDERS')->setWhere('day => "01-01-2015"')->getSelect();//->execSql();

?>


