<?php
mysql_connect( 'localhost', 'root', '' );
mysql_select_db( 'books' );

$qGenre = mysql_query( "SELECT genrename FROM genre" );

if( isset( $_GET['show'] ) )
{
  $qShow=mysql_query(
   "SELECT
    b.id,
    b.title,
    GROUP_CONCAT( DISTINCT a.authorname SEPARATOR ', ') AS authorname,
    GROUP_CONCAT( DISTINCT g.genrename SEPARATOR ', ') AS genrename,
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
    b.title
    ");

}
  require_once TEMPLATE.'index.inc.php';
?>
