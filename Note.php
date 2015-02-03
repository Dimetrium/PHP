Пойск по файлам grep -R 'my_file' *
форматирвоание Shift+G = gg

в нутри функций, классов и методов не печатаем.
Распечатка только в темплейте.
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
