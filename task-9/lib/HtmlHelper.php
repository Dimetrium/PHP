<?php
class HtmlHelper
{
  public static function css( $style )
  {
    $link = "<link href='".$style."' rel='stylesheet' type='text/css' />";
    return $link;
  }

  public static function renderSelectMulti( $class, $value )
  {
    $render = '';
    $render .= '<select multiple class="'.$class.'" >';
    foreach( $value as $res => $opt ) 
    {
      $render .= '<option>'.$opt.'</option>';
    } 
    $render .= '</select>';

    return $render;
  }
  public static function renderTable( $class, $thead )
  {
    $render = '';
    $render .= '<table class="'.$class.'"><thead><tr>';
    foreach( $thead as $res => $head ) 
    {
      $render .= '<th>'.$head.'</th>';
    } 
    $render .= '</tr></thead><tbody>';
    $tdata = array_slice(func_get_args(), 2);
    
    foreach( $tdata as $kay => $data ) 
    {
      $render .= '<tr>';
      foreach( $data as $dt)
      {
        $render .= '<td>'.$dt.'</td>';
      }
      $render .= '</tr>';
    }
    
    $render .= '</tbody></table>';
    return $render;
  }
  public static function renderOrderList( $value )
  {
    $render = '';
    $render .= '<ol>';
    foreach( $value as $res => $opt ) 
    {
      $render .= '<li>'.$opt.'</li>';
    } 
    $render .= '</ol>';

    return $render;
  }
  public static function renderDescList( $class, $termDesc )
  {
    $render = '';
    $render .= '<dl class="'.$class.'">';
    foreach( $termDesc as $term => $desc ) 
    {
      $render .= '<dt>'.$term.'</dt>';
      $render .= '<dd>'.$desc.'</dd>';
    } 
    $render .= '</dl>';

    return $render;
  }
  public static function radioBtnGroup( $class, $optradio )
  {
    $render = '';
    $render .= '<form role="form">';
    foreach( $optradio as $res => $option ) 
    {
      $render .= '<label class="'.$class.'">';
      $render .= '<input type="radio" name="optradio">'.$option;
      $render .= '</label>';
    } 
    $render .= '</form>';

    return $render;
  }
}
