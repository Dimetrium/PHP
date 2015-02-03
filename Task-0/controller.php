<?php
require_once MODEL;

$qGenre = genreMenu();


//$authors_arr = authorsMenu(); //get authors_menu array
//
///*--------------------------------------*/
//
//$booksmain = bookMain();
//
///*--------------------------------------*/
//
//$genre = abs((int)$_GET['genre']); //modul
//$get_genre = get_genre($genre);
//
///*--------------------------------------*/
//
//$authors = abs((int)$_GET['authors']);
//
//$get_authors = get_authors($authors);
//
///*--------------------------------------*/
//
//$id_book = abs((int)$_GET['id_book']);
//if($id_book)
//{
//   	$product = getProduct($id_book);
//   	$book_name = $product['book_name'];
//}
//
//if(isset($_POST[sendmail]))
//{
//   	$rez = sendmail($book_name);
// }
//
///*--------------------------------------*/
//
//$view = (!$_GET['view']) ? 'featured' : $_GET['view']; //get dynamic layouts
//
///*--------------------------------------*/

require_once TEMPLATE.'index.inc.php';