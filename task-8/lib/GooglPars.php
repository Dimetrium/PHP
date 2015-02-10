<?php
//class GooglPars
//{
//  public $keyword;
//  public function __construct($keyword)
//  {
//    $this->keyword = $keyword;
//  }
//  public function getWebPage()
//  {
//    
//    $url = 'https://www.google.com.ua/?gfe_rd=cr&ei=lODZVLDfFYTCUNT6gJAD&gws_rd=ssl#q=';
//    $url .= $this->keyword;
//    var_dump( $url );
//    $ch = curl_init( $url );
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//    curl_setopt($ch, CURLOPT_ENCODING, "");
//   // curl_setopt($ch, CURLOPT_USERAGENT, "");
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120 );
//    curl_setopt($ch, CURLOPT_TIMEOUT, 120 );
//    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
//    
//    $content = curl_exec( $ch );
//   // $err = curl_errno( $ch );
//   // $errmsg = curl_error( $ch );
//    $header = curl_getinfo( $ch );
//    curl_close( $ch );
//  //  $header['errno'] = $err;
//  //  $header['errmsg'] = $errmsg;
//    $header['content'] = $content;
//    return $header;
//  }
//}
//
//$result = new GooglPars('php');
//foreach ($result as $res)
//{
//  echo $res[3].'<br>';
//}
$keyword = 'VIM';
$ch = curl_init ("https://www.google.com.ua/search?q=$keyword&cad=h");
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_HEADER, 0);
//Поехали!
$res[] = curl_exec ($ch);

curl_close ($ch);
foreach ($res as $r)
{
  echo $r;
}

