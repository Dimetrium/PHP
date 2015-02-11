<?php
include( 'config.php' );
function __autoload( $class )
{
  include( 'lib/'.$class.'.php' );
}

$style = HtmlHelper::css( STYLE );

$selecMulti = HtmlHelper::renderSelectMulti(
  'selectpicker', 
  array( 'Options','One', 'Two', 'Three' )
);

$thead = HtmlHelper::renderTable(
  'table',
  array( 'Firstname', 'Lastname', 'Email' ),
  array( 'John', 'Smith', 'jsmit@email.com' ),
  array( 'Ivan', 'Ivanovitch', 'iivitch@email.com' ),
  array( 'Petrouv', 'Vasily', 'vpetrovh@email.com' )
);

$orderList = HtmlHelper::renderOrderList(
  array( 'One', 'Two', 'Three' )
);

$descList = HtmlHelper::renderDescList(
  'dl-horizontal',
  array(
    'Coffee'=>'Black hot drink',
    'Milk'=>'White cold drink' 
  )
);

$radioBtnGroup = HtmlHelper::radioBtnGroup( 'radio-inline', array( 'Option 1', 'Option 2', 'Option 3' ));


include TEMPLATE;
