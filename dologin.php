<?php
include_once "db.php";
session_start();
$userName = $_REQUEST["userName"];
$password = $_REQUEST["password"];


$sql= "SELECT * FROM user WHERE userName = '$userName' and password = '$password'";
$dataset = $conn->query($sql);

if($row = $dataset->fetch_assoc()){
	echo "tmaaam";
	$_SESSION["id"] = $row["id"];
	$_SESSION["userTypeId"] = $row["userTypeId"];
	//echo "<a href=myprofile.php?id=" . $row["id"] ."</a>  <hr>";

	header("Location: about.php");
}
else{
	echo "user not found";
}


?>