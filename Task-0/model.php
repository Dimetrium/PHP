<?php
function genreMenu(){
		global $link;
		$query = 
			"SELECT genrename FROM genre";
		if ($stmt = mysqli_prepare($link, $query)) {
    /* Запустить запрос */
    mysqli_stmt_execute($stmt);
    /* Определить переменные для результата */
    mysqli_stmt_bind_result($stmt, $genre);
    /* Выбрать значения */
    
    $dropdown = '';
    while (mysqli_stmt_fetch($stmt)) 	{
			$dropdown .= $genre[genrename];
		}
			    mysqli_stmt_close($stmt);
//	mysqli_free_result($result);
	mysqli_close($link);
	return $dropdown;
	}
}

///*-----------Function Get Menu ---------*/
//    //получение данных с таблиц БД для меню - все жанры
//    function categoryMenu()
//        {
//            $query = 
//            "SELECT * 
//            FROM  `xyz_categories` 
//            ORDER BY  `id`";
//            $result = mysql_query($query) or die(mysql_query(Error));
//            
//            $category_arr = array();
//            
//            while($row = mysql_fetch_assoc($result))
//        	    {
//        	        $category_arr[] = $row; 
//        	    }
//            
//        return $category_arr;
//        }
//    
//    //получение данных с таблиц БД для меню - все авторы
//    function authorsMenu() 
//        {
//            $query = 
//            "SELECT * 
//            FROM  `xyz_authors` 
//            ORDER BY  `authr_name`";
//            $result = mysql_query($query) or die(mysql_query(Error));
//            
//            $authors_arr = array();
//            
//            while($row = mysql_fetch_assoc($result))
//        	    {
//        	        $authors_arr[] = $row; 
//        	    }
//            
//        return $authors_arr;
//        }
///*-------END Function Get Menu ---------*/
//
///*-------Function Get Data for All Products (books) ----------*/
//    //получение данных с таблиц БД для главной стринцы - вытягивает все книги.
//    function bookMain()
//        {
//            $query = 
//            "SELECT id_book, book_name, img, price, full_text, visible 
//            FROM xyz_products 
//            WHERE visible='1'";
//            $res = mysql_query($query) or die(mysql_query(Error));
//        
//            $booksmain = array();
//        
//            while($row = mysql_fetch_assoc($res))
//                {   
//                    $booksmain[]  = $row;
//                }
//
//        return $booksmain;
//        }
///*-------END Function Get All Products (books) ------*/
//
///*-------Function Get Data for Details Products (books) ----------*/
//    //получение данных с таблиц БД для меню - вытягивает детальную инфо для страницы "Детально"
//    function getProduct($id_book)
//        {
//            $query = 
//            "SELECT DISTINCT id_book, price, book_name, img, full_text, GROUP_CONCAT(DISTINCT authr_name) 
//            as authors_name, GROUP_CONCAT(DISTINCT title SEPARATOR ', ') 
//            as categories_name 
//            FROM xyz_products, xyz_authors, xyz_categories 
//            INNER JOIN xyz_byauth, xyz_bycat 
//            WHERE xyz_products.id_book = xyz_byauth.book_id 
//            and xyz_authors.id_authr = xyz_byauth.auth_id 
//            and xyz_products.id_book = xyz_bycat.book_id 
//            and xyz_categories.id = xyz_bycat.cat_id 
//            and id_book = $id_book 
//            and visible='1' 
//            GROUP BY book_name";
//        
//            $res = mysql_query($query);
//        
//            $product = array();
//        
//            $product = mysql_fetch_assoc($res);
//        
//        return $product;
//        }
///*-------END Function Get Data for Details Products (books) ------*/
//
///*-------выборка данных с таблиц БД соответствие жанров к книгам\авторов к книгам----------*/
//    //получение данных с таблиц БД - соответсвии книг к жанрам
//    function getGenre($genre)
//        {
//            $query = 
//            "SELECT * 
//            FROM xyz_products, xyz_categories 
//            INNER JOIN xyz_bycat 
//            WHERE xyz_products.id_book = xyz_bycat.book_id 
//            and xyz_categories.id = xyz_bycat.cat_id 
//            and visible='1' 
//            and id=$genre";
//            $res = mysql_query($query) or die(mysql_query(error));
//            
//            $get_genre = array();
//            
//            while($row = mysql_fetch_assoc($res))
//                {
//                    $get_genre[] = $row;         
//                }
//
//        return $get_genre;
//        }
//
//    //получение данных с таблиц БД - соответсвии книг к авторам
//    function getAuthors($authors) 
//        {
//            $query = 
//            "SELECT * 
//            FROM xyz_products, xyz_authors 
//            INNER JOIN xyz_byauth 
//            WHERE xyz_products.id_book = xyz_byauth.book_id 
//            and xyz_authors.id_authr = xyz_byauth.auth_id 
//            and visible='1' 
//            and id_authr=$authors";
//            $res = mysql_query($query) or die(mysql_query(error));
//        
//            $get_authors = array();
//        
//            while($row = mysql_fetch_assoc($res))
//                {
//                    $get_authors[] = $row;         
//                }
//    
//        return $get_authors;
//        }
//
///*-------END выборка данных с таблиц БД соответствие жанров к книгам\авторов к книгам----------*/
//
////send mail admin
//    function sendmail($book_name)
//        {
//            $quantity = (int)$_POST[quantity];
//            $firstname = htmlspecialchars(trim($_POST[firstname]));
//            $lastname = htmlspecialchars(trim($_POST[lastname]));
//            $text = htmlspecialchars(trim($_POST[text]));
//            $contactemail = htmlspecialchars(trim($_POST[contactemail]));
//            $rez = mail("admin@test.ru","$book_name","Want to buy $quantity qty.\nBook Name: $book_name.\nMy name: $firstname $lastname.\nMy address: $text.\nPlease contact email: $contactemail.");
//        }       
?>
