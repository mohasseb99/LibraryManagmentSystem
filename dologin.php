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
}
else{
	echo "user not found";
}


?>