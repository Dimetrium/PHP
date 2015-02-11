<?php
class HtmlHelper
{
  protected $value = array();
  public function __set($kay = null, $option)
  {
    $this->value[$kay] = $option;
  }
  public function __get($option)
  {
  }
  public static function css( $style )
  {
    $link = "<link href='".$style."' rel='stylesheet' type='text/css' />";
    return $link;
  }

  public static function renderSelectMulti($class, $value)
  {
    $render = '';
    $render .= '<select class="'.$class.'">';
    foreach($value as $res=>$opt)
    {
      $render .= '<option>'.$opt.'</option>';
    } 
    $render .= '</select>';

    return $render;
  }
}
echo $test;
