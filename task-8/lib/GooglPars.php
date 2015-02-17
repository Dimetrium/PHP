<?php
include 'simple_html_dom.php';

if(isset($_POST['keyword']))
{
  $keyword = $_POST['keyword'];
}  
else
{
  $keyword = '';
}

$html = file_get_html( "http://www.google.com.ua/search?q=$keyword&cad=h" );

// Parse all <div id=ires><ol><li> tags.
if ( $html->outertext!='' && count ( $html->find ( '#ires ol' )))
{
  foreach ( $html->find ( '#ires ol' ) as $ol )
  {

    // Fix Url
    foreach ( $ol->find ( 'a' ) as $a )
    {
      $a->href = str_replace ( '&amp;', '&', $a->href );
      $a->href = 'https://www.google.com.ua' . $a->href;
    }

    // Clear style
    foreach ( $ol->find ( '*[class]' ) as $s )
    {
     $s->class = '';
    }

    $res = '<h3>Result: </h3></br>' . $ol->outertext . '</br>';
    return $res; 
  }
}

$html->clear();
unset ( $html );
