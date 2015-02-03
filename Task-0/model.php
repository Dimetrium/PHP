<?php
//$qGenre=mysql_query("SELECT genrename FROM genre");	
//
//$dropdown = '';
//
//while($genre=mysql_fetch_assoc($qGenre)){
//	$dropdown .= $genre[genrename];
//}
//mysql_fetch_assoc($qShow)
function genreMenu(){
		global $link;
		$query = 
			"SELECT genrename FROM genre";
		if ($stmt = mysqli_prepare($link, $query)) {
    /* Запустить запрос */
    mysqli_stmt_execute($stmt);
    /* Определить переменные для результата */
    mysqli_stmt_bind_result($stmt, $genrename);
    /* Выбрать значения */
    while (mysqli_stmt_fetch($stmt)) 	{
			$allgenre[] = $genrename; 
		}
			    mysqli_stmt_close($stmt);
//	mysqli_free_result($result);
	mysqli_close($link);
	return $allgenre;
	}
}

//
//function getAll(){
//	$query = "
//			SELECT
//				b.id,
//				b.title,
//				GROUP_CONCAT(DISTINCT a.authorname SEPARATOR ', ') AS authorname,
//				GROUP_CONCAT(DISTINCT g.genrename SEPARATOR ', ') AS genrename,
//				b.description,
//				b.price 
//			FROM 
//				book b 
//			JOIN 
//				book_author ba 
//				ON 
//				ba.bookid=b.id 
//			JOIN 
//				author a 
//				ON 
//				a.id=ba.authorid 
//			JOIN 
//				book_genre bg 
//				ON 
//				bg.bookid=b.id 
//			JOIN 
//				genre g 
//				ON 
//				g.id=bg.genreid
//			WHERE				
//				g.genrename LIKE '%$_GET[genre]%' 
//				AND				
//				(b.title LIKE '%$_GET[search]%' 
//				OR
//				a.authorname LIKE '%$_GET[search]%')
//		 	GROUP BY 
//				b.title"
//		;
//	$result = mysql_query($query) or die(mysql_query(Error));
//	$all
//}
?>