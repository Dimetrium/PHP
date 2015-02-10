<?php
class HtmlHelper
{
  public function renderSelectMulti($option, $valueKey, $name = $valueKey)
  {
    $reneder = '';
    foreach ( $option as $opt )
    {
      $render .= '<select multiple> </select>'
  }
}
