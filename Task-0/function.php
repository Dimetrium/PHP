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
		$query = 
			"SELECT genrename FROM genre";
		$result = mysql_query($query) or die(mysql_query(Error));
			
		$allgenre = array();
			
		while($row = mysql_fetch_assoc($result))
		{
			$allgenre[] = $row; 
		}
		
	return $allgenre;
	}


function getAll(){
	$query = "
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
				b.title"
		;
	$result = mysql_query($query) or die(mysql_query(Error));
	$all
}