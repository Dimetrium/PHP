<?php
class GooglePars
{
  private $keyword;
  private $curl;
  private $html;
    
  public function __construct($keyword)
  {
    $this->keyword = rawurlencode($keyword);
    if(isset($this->keyword))
    {
      return $this->keyword;
    }  
    else
    {
      return $this->keyword ='';
    }
  }

  protected function getHtml()
  {
    $this->curl = curl_init("http://www.google.com.ua/search?q=$this->keyword&cad=h");
    curl_setopt( $this->curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt( $this->curl, CURLOPT_HEADER, 0);
    return $this->curl;
  }

  protected function simpleDom()
  {
    $this->html = new simple_html_dom();
    $this->html->load(iconv('CP1251', 'UTF-8', (curl_exec($this->curl))));
    curl_close ($this->curl);
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
