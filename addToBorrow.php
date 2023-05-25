<?php 

include_once "db.php";
session_start();

$cart = $_SESSION['cart'];
$userId = $_SESSION["id"];

//borrow table
$borrowDate = date('Y-m-d');
$sql = "insert into borrow (readerId, borrowDate) values ($userId, '$borrowDate')";
$conn->query($sql);
$borrowId = $conn->insert_id;

foreach ($cart as $bookId){
	$sql= "SELECT * FROM books WHERE id = $bookId";
	$dataset = $conn->query($sql);
	$row = $dataset->fetch_assoc();

	if($row["available"] > 0){
	
		$sql = "insert into borrowdetails (borrowId, bookId) values ($borrowId, $bookId)";
		$conn->query($sql);

		$ava = $row["available"] - 1;
		$sql = "UPDATE books SET available = $ava WHERE id = $bookId";
		$conn->query($sql);
	}
} 

header("Location: clearCart.php");
?>