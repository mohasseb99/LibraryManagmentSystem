<?php 

include_once "db.php";

$borrowId = $_REQUEST["bid"];
$sql= "SELECT * FROM borrowdetails WHERE borrowId = $borrowId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc()){
	echo $row["bookId"];
	echo "										";
	//$sql = "SELECT * from books WHERE id =".$row["bookId"];
	$sql = "SELECT * FROM books, bookcategory 
			WHERE books.id =" . $row["bookId"] . " and books.categoryId = bookcategory.id";
	$bookDataset = $conn->query($sql);
	$bookObj=$bookDataset->fetch_assoc();
	echo $bookObj["bookName"] . " Category Name: " . $bookObj["name"];
	echo "<br>";
	$sql = "select * from bookfile where bookId=". $row["bookId"];
	$fileDataSet = $conn->query($sql);
	while($rowFile = $fileDataSet->fetch_assoc()){
		echo "<img src=" . $rowFile["filePath"] . ">" . "<br>";
	}



}


?>