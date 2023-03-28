<?php
session_start();
if(isset($_SESSION["id"])){
	include_once "db.php";

	$sqlstmtUserTypes = "SELECT * FROM usertype";
	$resultDataSet = $conn->query($sqlstmtUserTypes);
	while ($row = $resultDataSet->fetch_assoc())
	{
		echo "<a href=listAllUsers.php?userTypeId=" . $row["id"] .  ">" . $row["name"] . "</a>  <hr>";
	}
}
else{
	header('location:login.php?msg= Not Authorized <br> Please log in first');
}
?>

