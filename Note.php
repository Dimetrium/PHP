Пойск по файлам grep -R 'my_file' *
форматирвоание Shift+G = gg

все функции и класы хранятся в lib

в нутри функций, классов и методов не печатаем.
Распечатка только в темплейте.

рекомендуется рекваэрами пользоватся.
------------------------------------

дял каждого класса отдельный фаил. к

имя файла Demo.php
<?php

class Demo
{
  private $color;
  private $massa
  public function getColore()
  {
    if($this->userType == 'admin')
    {
      $this->setColor('black');
      return $this->color;
    }
  }
  public finction setColor()
  {
    if($this->userType == 'admin') //
    {
      $this->color = $color;
    }
    else
    {
      return false;
    }
    return true;
  }
}


$obj = new Demo();
$obj->setColor('red');
$obj->getColor();

// Использование тоько приват для атрибутов(свойств)
//..методы могут быть как публичные как приватные так и протектед.

//Магические методы:
// __construct - по умолчанию должен быть паблик (в конструкторе инициилизируют все свойства которые у нас есть)
// __construct - ничего не возращает (не делать ретурны и т.д.) . ловить только эксепшеном. (throw new Exeption('Error: host no fucked');)
class Demo
{
  private $color;
  private $massa
  
  public function __construct($color, $massa)
  {
    $this->color = $color;
    $this-massa = $massa;
    throw new Exeption('Error: host no fucked');
  }
}

//ловить только эксепшеном
  try
  {
    $obj = new Demo('black', 17);
    $obj->setColor('red');
    $obj->getColor();
  }
  catch (Exeption $error)
  {
    echo $error->getMessage();
  }
  
  
//----- __destruct (выполняет дейтсвие перед удалением обьекта)(ПХП сам уаляет обьект, а деструктом можно сделать действие перед удалением)
//если огибка в коде, или переполнена память сервереа, деструктор срабатывает, и сохраняет данные.
//


class Demo
{
  private $color;
  private $massa
  
  public function __construct($color, $massa)
  {
    $this->color = $color;
    $this-massa = $massa;
    throw new Exeption('Error: host no fucked');
  }
  public function __destruct()
  {
    if ($this->flag === true)
    {
      $this->saveAllData();
    }
  }
}

// function __autoload($class) - функция загрузки автоматически клссов которые не загружаются в ручном режиме. В индекцсе не пишутся инклуды файлов и в процессе выполнения программа видит инициализацию обьект, то пхп видит что этот фаил не загружен , пхп ищет аутолоад , передаёт название класса и инклудит
function __autoload($class)
{
  include('lib/'.$class.'.php');
}
