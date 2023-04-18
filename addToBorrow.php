<?php 

include_once "db.php";
$bookId = $_REQUEST["bookId"];
$userId = $_REQUEST["userId"];


$sql= "SELECT * FROM books WHERE id = $bookId";
$dataset = $conn->query($sql);
$row = $dataset->fetch_assoc();

if($row["available"] > 0){
	//borrow table
	$borrowDate = date('Y-m-d');
	$sql = "insert into borrow (readerId, borrowDate) values ($userId, '$borrowDate')";

	$conn->query($sql);
	$borrowId = $conn->insert_id;

	$sql = "insert into borrowdetails (borrowId, bookId) values ($borrowId, $bookId)";
	$conn->query($sql);

	$ava = $row["available"] - 1;
	$sql = "UPDATE books SET available = $ava WHERE id = $bookId";
	$conn->query($sql);
}


?>