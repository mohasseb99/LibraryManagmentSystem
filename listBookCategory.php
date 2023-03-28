<?php

include_once "db.php";
$sqlstmtUserTypes = "SELECT * FROM bookcategory";
$resultDataSet = $conn->query($sqlstmtUserTypes);
$userId=$_REQUEST["userId"];

//echo $resultDataSet->num_rows;
// it returs rows as array
while ($row = $resultDataSet->fetch_assoc())
{
	$sql = "SELECT count(*) FROM books WHERE categoryId=" . $row["id"];
	$resultDataSet1 = $conn->query($sql);
	$row1 = mysqli_fetch_array($resultDataSet1);
	echo "<a href=listAllbooks.php?categoryId=" . $row["id"] .  "&userId=". $userId .">" . $row["name"] . "(". $row1[0] .")</a>  <hr>";
	

}
?>

