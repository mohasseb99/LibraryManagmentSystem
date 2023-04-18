<?php

include_once "db.php";


$sqlstmtUserTypes = "SELECT * FROM bookcategory";
$resultDataSet = $conn->query($sqlstmtUserTypes);
//$userId=$_REQUEST["userId"];

//echo $resultDataSet->num_rows;
// it returs rows as array
while ($row = $resultDataSet->fetch_assoc())
{
	$sql = "SELECT count(*) FROM books WHERE categoryId=" . $row["id"];
	$resultDataSet1 = $conn->query($sql);
	$row1 = mysqli_fetch_array($resultDataSet1);
	echo "<a href=listAllBooks.php?categoryId=" . $row["id"] .">"   . $row["name"] . "(". $row1[0] .")</a>  <hr>";
	

}
$search_term = $_POST['search'];
$sql = "SELECT * FROM bookcategory WHERE name LIKE '%$search_term%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "category found";
  } else {
	echo "category not found sorry!.";
  }




?>



<form method="POST" action="listBookCategory.php">
  <input type="text" name="search" placeholder="Search by category name...">
  <button type="submit">Search</button>
</form>
  