<?php
include 'simple_html_dom/simple_html_dom.php';
$keyword = 'VIM';

$html = file_get_html( "https://www.google.com.ua/search?q=$keyword&cad=h" );
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
    foreach ( $ol->find ( '*[style]' ) as $s )
    {
     $s->innertext = 'jjjj';
    }
    
    echo $ol->outertext . '</br>';
  }
}


//////////////////////////////////////////////////////////////////////////////
////TODO: Cutoff all styles.
//$b = $html->find('div.kv[style]');
//$b->outertext = '';


$html->clear();
unset ( $html );
