<?php
class GooglePars
{
  private $keyword;
  private $curl;
  private $html;
    
  public function __construct($keyword)
  {
    $this->keyword = $keyword;
  }

  protected function getHtml()
  {
    $curl = curl_init("http://www.google.com.ua/search?q=$this->keyword&cad=h");
    curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt( $curl, CURLOPT_HEADER, 0);
    $html = new simple_html_dom();
    $html->load(iconv('CP1251', 'UTF-8', (curl_exec($curl))));
    curl_close ($curl);
    return $this->html;
  }

  protected function parsElements()
  {
    if ( $this->html->outertext!='' && count ( $this->html->find ( '#ires ol' )))
    {
      foreach ( $this->html->find ( '#ires ol' ) as $ol )
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
        return $this->res; 
      }
    }
    $this->html->clear();
    unset ( $this->html );
    return $this->res; 
  }
}
