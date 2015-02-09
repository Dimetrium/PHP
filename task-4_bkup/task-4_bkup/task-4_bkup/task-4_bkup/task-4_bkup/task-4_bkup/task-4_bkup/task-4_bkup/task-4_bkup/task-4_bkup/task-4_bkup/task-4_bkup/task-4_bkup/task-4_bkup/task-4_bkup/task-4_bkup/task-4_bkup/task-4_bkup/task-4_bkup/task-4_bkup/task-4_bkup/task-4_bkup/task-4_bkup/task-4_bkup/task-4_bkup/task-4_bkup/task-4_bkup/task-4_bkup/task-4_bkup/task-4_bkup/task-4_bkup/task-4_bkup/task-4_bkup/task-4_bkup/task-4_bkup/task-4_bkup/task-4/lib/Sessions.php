<?php
class Sessions implements iDataWork
{
  public function __construct()
  {
    session_start();
  }
  public function add($kay, $val)
  {
    $_SESSION[$kay] = $val;
    return true;
  }

  public function read($kay)
  {
    return $_SESSION[$kay];
  }

  public function remove($kay)
  {
      unset($_SESSION[$kay]);
    return true;
  }

}
