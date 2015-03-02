<?php 
function dbConnect()
{
  $link =  mysqli_connect( HOST, USER, PASSWORD, DB );
  if ( !$link ) 
  {
    die( "Connection failed: " . mysqli_connect_error( $link ) );
  }
  return $link;
}

function getQuery( $var )
{
  switch ( $var ) 
  {
    case 'genre':
      $qGenre = mysqli_query( $link, "SELECT genrename FROM genre" );
      if (mysqli_num_rows($qGenre) > 0)
      {
        $genre = mysqli_fetch_assoc( $qGenre );
      }
      return $genre;
      break;

    case 'content':
      $qShow = mysqli_query( $link,
        "SELECT b.id, b.title,
        GROUP_CONCAT(DISTINCT a.authorname SEPARATOR ', ') AS authorname,
        GROUP_CONCAT(DISTINCT g.genrename SEPARATOR ', ') AS genrename,
        b.description, b.price 
        FROM book b JOIN book_author ba 
        ON ba.bookid=b.id JOIN author a 
        ON a.id=ba.authorid JOIN book_genre bg 
        ON bg.bookid=b.id JOIN genre g 
        ON g.id=bg.genreid 
        WHERE g.genrename 
        LIKE '%$_GET[genre]%' 
        AND (b.title LIKE '%$_GET[search]%' 
        OR a.authorname LIKE '%$_GET[search]%')
        GROUP BY b.title");
      $show = mysqli_fetch_assoc( $qShow );
      return $show;
      break;
  }
  mysqli_close($link);
}

function getGenreMenu()
{
  $dropdown .= '';
{
  while ( getQuery('genre') )
  {
    $dropdown .= "<option>$genre[genrename]</option>";
  }
}
return $dropdown;
}

function getTableRow()
{
  $rcolor = 1;
  while ( getQuery('content') )
  {
    if ( 1 == ( $rcolor % 2 ) )
    {
      $color  = 'white';
      $bgColor = '#4a4a4a';
    }
    else
    {
      $color  = 'black';
      $bgColor = '#cacaca';
    }
    $tableRow .= 
      "<tr style='color: $color; background-color: $bgColor'>
      <td width='25%'>
      <a style='color: $color; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a>
      </td>
      <td width='20%'>$show[authorname]</td>
      <td width='13%'>$show[genrename]</td>
      <td width='40%'>$show[description]</td>
      <td width='2%'>$show[price]</td>
      </tr>";
    $rcolor++;
  }
  $tableRow .= '</table>';    
  return $tableRow;
}
