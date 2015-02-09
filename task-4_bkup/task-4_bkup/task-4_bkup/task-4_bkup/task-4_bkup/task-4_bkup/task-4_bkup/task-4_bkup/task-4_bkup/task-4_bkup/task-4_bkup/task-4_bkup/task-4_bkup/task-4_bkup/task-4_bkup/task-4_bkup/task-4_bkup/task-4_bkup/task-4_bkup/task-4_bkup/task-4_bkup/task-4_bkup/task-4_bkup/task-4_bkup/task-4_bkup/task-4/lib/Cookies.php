<?php
class Cookies implements iDataWork
{
  public function add($kay, $val)
  {
    setcookie($kay, $val, time() +3600, ""); 
  }

  public function read($kay)
  {
    return $_COOKIE[$kay];
  }

  public function remove($kay)
  {
    setcookie ($kay, "", time() - 3600, "");
  }
}
