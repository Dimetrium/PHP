<?php
class GooglePars
{
  private $keyword;
  private $html;
  private $res;
    
  public function __construct( $keyword )
  {
    $this->keyword = $keyword;
    $curl = curl_init( "http://www.google.com.ua/search?q=$this->keyword&cad=h" );
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt( $curl, CURLOPT_HEADER, 0);
    $this->html = iconv( 'CP1251', 'UTF-8', ( curl_exec( $curl ) ) );
    curl_close ( $curl );
  }


/**
* Create a new obj $dom
* and loads a result of the function CURL.
*/
  public function parsElements()
  {
    $dom = new simple_html_dom();
    $dom->load( $this->html );
    if ( $dom->outertext!='' && count ( $dom->find ( '#ires ol' )))
    {
      foreach ( $dom->find ( '#ires ol' ) as $ol )
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

        $this->res = '<h3>Result: </h3></br>' . $ol->outertext . '</br>';
       // return $this->res; 
      }
    }
    $dom->clear();
    unset ( $dom );
    return $this->res; 
  }
}
