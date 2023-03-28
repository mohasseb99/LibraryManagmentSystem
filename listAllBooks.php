<?php

include_once "db.php";
$categoryId = $_REQUEST["categoryId"];
$userId = $_REQUEST["userId"];

$sql= "SELECT * FROM books WHERE categoryId = $categoryId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc()){
	echo $row["bookName"] . ":" . $row["fees"] . " Quantity: " . $row["quantity"];
	echo "<a href=addToBorrow.php?bookId=" . $row["id"] . "&userId=$userId> Add to Borrowed Books </a>";
	echo "<hr>";
}


?>