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

//get html dom using CURL
$curl = curl_init("http://www.google.com.ua/search?q=$keyword&cad=h");
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt( $curl, CURLOPT_HEADER, 0);

/**
 * Create a new obj $html
 * and loads a result of the function CURL.
 */
$html = new simple_html_dom();
$html->load(iconv('CP1251', 'UTF-8', (curl_exec($curl))));
curl_close ($curl);

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
