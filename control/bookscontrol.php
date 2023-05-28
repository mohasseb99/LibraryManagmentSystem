<?php
include_once "../models/books.php";
include_once "../view/booksview.php";

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$obj= new books($id);
$bookviewObj=new booksview();
$bookviewObj->showbooks($obj);



//echo $obj->getBookName()."-".$obj->getCategoryIdObj()->getName();




?>