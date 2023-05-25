

<?php
include_once "header.php";
?>

<table border = 1 width = "100%">
	<tr> <td> Book Name </td> <td> Category Name </td> <td> book Image </td>

<?php 

include_once "db.php";

$borrowId = $_REQUEST["bid"];
$sql= "SELECT * FROM borrowdetails WHERE borrowId = $borrowId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc()){
	//$sql = "SELECT * from books WHERE id =".$row["bookId"];
	$sql = "SELECT * FROM books, bookcategory 
			WHERE books.id =" . $row["bookId"] . " and books.categoryId = bookcategory.id";
	$bookDataset = $conn->query($sql);
	$bookObj=$bookDataset->fetch_assoc();
	?>
	
	<tr><td width = "30%"><?php echo $bookObj["bookName"] ?> </td> <td width = "30%"> <?php echo $bookObj["name"]; ?></td>
	<?php
	$sql = "select * from bookfile where bookId=". $row["bookId"];
	$fileDataSet = $conn->query($sql);
	?><td width = "30%"> <?php
	while($rowFile = $fileDataSet->fetch_assoc()){
		echo "<img src=" . $rowFile["filePath"] . ">" . "<br>";
	}
	?> </td></tr> <?php



}

?> </table>

<?php
include_once "footer.php";
?>
