<?php 

include_once "db.php";
$bookId = $_REQUEST["bookId"];
$userId = $_REQUEST["userId"];


//borrow table
$borrowDate = date('Y-m-d');
$sql = "insert into borrow (readerId, borrowDate) values ($userId, '$borrowDate')";

$conn->query($sql);
$borrowId = $conn->insert_id;

$sql = "insert into borrowdetails (borrowId, bookId) values ($borrowId, $bookId)";
$conn->query($sql);








?>