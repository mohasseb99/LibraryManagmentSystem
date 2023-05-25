<?php
	include_once "db.php";

	$borrowId = $_REQUEST["id"];

	$sql= "SELECT * FROM borrowdetails WHERE borrowId = $borrowId";
	$dataset = $conn->query($sql);
	$row = $dataset->fetch_assoc();

	$bookId = $row["bookId"];

	$sql= "SELECT * FROM books WHERE id = $bookId";
	$dataset = $conn->query($sql);
	$row = $dataset->fetch_assoc();

	$ava = $row["available"] + 1;
	$sql = "UPDATE books SET available = $ava WHERE id = $bookId";
	$conn->query($sql);

	$sql = "DELETE FROM borrow WHERE id = $borrowId";
	$conn->query($sql);

	header('location:showReaderborrowing.php');

?>