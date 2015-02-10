<?php
class HtmlHelper
{
  public static function renderSelectMulti($valueKey)
  {
    $reneder = '';
      $render .= '<select multiple>\n<option>'.$valueKey.'</option>\n</select>';
    return $render;
  }
}
$test = HtmlHelper::renderSelectMulti('test');
echo $test;
