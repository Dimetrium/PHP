<?php 
mysql_connect( 'localhost', 'root', '');
mysql_select_db( 'books');


$qGenre = mysql_query( "SELECT genrename FROM genre" );
$qShow = mysql_query("
  SELECT
  b.id,
  b.title,
  GROUP_CONCAT(DISTINCT a.authorname SEPARATOR ', ') AS authorname,
  GROUP_CONCAT(DISTINCT g.genrename SEPARATOR ', ') AS genrename,
  b.description,
  b.price 
  FROM 
  book b 
  JOIN 
  book_author ba 
  ON 
  ba.bookid=b.id 
  JOIN 
  author a 
  ON 
  a.id=ba.authorid 
  JOIN 
  book_genre bg 
  ON 
  bg.bookid=b.id 
  JOIN 
  genre g 
  ON 
  g.id=bg.genreid
  WHERE       
  g.genrename LIKE '%$_GET[genre]%' 
  AND       
  (b.title LIKE '%$_GET[search]%' 
  OR
  a.authorname LIKE '%$_GET[search]%')
  GROUP BY 
  b.title");

$dropdown .= '<option value="">ìÏ</option>';
while ( $genre = mysql_fetch_assoc( $qGenre ) )
{
  $dropdown .= "<option>$genre[genrename]</option>";
}

$rcolor = 1;
$showMenu .= '';

if ( isset( $_GET['show'] ))
{
  $showMenu .= '
    <table width="100%" cellpadding="5px">
    <th>î×ÎÅ/th>
    <th>áÏ</th>
    <th>ö</th>
    <th>ïÓÎÅ/th>
    <th>ãÁ/th>';

  while ( $show = mysql_fetch_assoc( $qShow ) )
  {
    if ( 1 == ( $rcolor % 2 ) )
    {
      $showMenu .= "<tr style='color: white; background-color: #4a4a4a'>
        <td width='25%'><a style='color: white; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>";
    }
    else
    {
      $showMenu .= "<tr style='color: black; background-color: #cacaca'>
        <td width='25%'><a style='color: black; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>";
    }
    $showMenu .= "
      <td width='20%'>$show[authorname]</td>
      <td width='13%'>$show[genrename]</td>
      <td width='40%'>$show[description]</td>
      <td width='2%'>$show[price]</td>
      </tr>";
    $rcolor++;
  }
  $showMenu .= '</table>';    
}
else 
{
  $showMenu .= '
    <div style="text-align: left;">
    óÁØÐÏÔÊËÉÎÊËÔÌÇ<br><br> 
    õ×ÑÚËÚÉÁ<br>
    îÎ ÓÚÁØ×ÂÉÔÒÅÓÁÍÎÓÒÔÒ ÄÑ×ÅÅÉ/ÒÄËÉÏÁÉ ÎÚÁÉ ËÉ (ÉËÁËÇ ÏÉÁÉ ÏÞÍËÉÁ, ÃÎ ÁÔÒ×ÉÖÎÏ.<br><br>
    ðÚ×ÔÌ ÉÔÒÅÁÄÌÅ ÕÅØ
    <ol>  
    <li>ðÏÒÔ ÓÉÏ ËÉ ×ÂÒÑÖÎ (ËÉÁÍÖÔÐÉÁÌÖÔ ÒÚÙ ÖÎÁ);</li>
    <li> ðÏÒÔ ÓÉÏ ËÉ ×ÂÁ ÁÔÒ (ËÉÁÍÖÔÐÉÁÌÖÔ ÒÚÙ ÁÔÒÍ;</li>
    <li> ðÏÒÔ ÓÒÎÃ ÓÄÔÌÎÊÉÆÒÁÉÊÏÐÎÁÉÛÊÑËÉÅ</li>
    <li> îÜÏ Ö ÓÒÎÃ ÐÌÚ×ÔÌ ÄÌÅ ÉÅØ×ÚÏÎÓØÏÐÁÉØÆÒÕÚËÚ ÜÏ ËÉÉÓÐÌÍ - áÅ, æ, ëÉÅÔÏÜÚÍÌÒ×
    üÒÁÏÐÁÉ ÐÓÍ ÁÍÎ ÓÉÆÒÁÉÊÏËÉÅÉÉÆÒÁÉ ÏÚËÚÉÅ</li> 
    </ol>
    äÏÎÔÌÎÑÉÆÒÁÉ:
    <ul>
    <li> ×Ï ×ÁÍÎÞÓØÓÅÁØÓÐÍÝÀ.htaccess, ÉÆÒÁÉ ÏÌÇÎÐÒÌ ÁÍÎÓÒÔÒ ×âÈÁÉØÎ ÎÖÏ</li>
    <li> ÖÎÙËÉ ÏÎÕÏÎ×Å ×ÏÅÉ ÎÔ</li>
    <li> ÈÁÉØÉÆÒÁÉ ÏÐÌÚ×ÔÌÈÓÊÁÎ ÎÖÏ</li>
    <li> ÉÆÒÁÉ ÏÚËÚÈËÉ ÈÁÉØ×âÎ ÎÖÏ ÏÁÄÌÎ ÏÔ×ÔÓ ×ÐÓÍÈ</li>
    </ul>
    </div>';
}

include TEMPLATE;

