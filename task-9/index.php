<?php
include('config.php');
function __autoload( $class )
{
  include('lib/'.$class.'.php');
}

$style = HtmlHelper::css(STYLE);
$selecMulti = HtmlHelper::renderSelectMulti('selectpicker','test');
