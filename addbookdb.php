<?php
include_once "db.php";



$bookName = $_REQUEST["bookName"];
$categoryid = $_REQUEST["categoryId"];
$quantity = $_REQUEST["quantity"];
$fees = $_REQUEST["fees"];
$description=$_REQUEST["descriptionbook"];





if($_REQUEST["bookId"] != ""){
	$bookId = $_REQUEST["bookId"];
	$sql = "UPDATE books SET bookName = '$bookName', categoryId = '$categoryid', quantity = '$quantity', fees = '$fees',descriptionbook = '$description'  WHERE id = $bookId";
	$conn->query($sql);
}
else{
	$sql = "insert into books (bookName, categoryId, quantity, fees, descriptionbook) values ('$bookName', '$categoryid', '$quantity', '$fees','$description')";
	$conn->query($sql);
}






header('location:listAllBooks.php');



?>