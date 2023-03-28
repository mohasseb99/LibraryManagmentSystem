<?php 

include_once "db.php";
// there is _POST and _GET and they are faster than _REQUEST but you should know which method used
$fullName = $_REQUEST["fullName"];
$dateOfBirth = $_REQUEST["dateOfBirth"];
$userTypeId = $_REQUEST["userTypeId"];
$password = $_REQUEST["password"];
$userName = $_REQUEST["userName"];


if($_REQUEST["userId"] != ""){
	$userId = $_REQUEST["userId"];
	$sql = "UPDATE user SET userName = '$userName', password = '$password', fullName = '$fullName', dateOfBirth = '$dateOfBirth', userTypeId = $userTypeId WHERE id = $userId";
	$conn->query($sql);
}
else{
	$sql = "insert into user (fullName, dateOfBirth, userTypeId, password, userName) values ('$fullName', '$dateOfBirth', '$userTypeId', '$password', '$userName')";
	$conn->query($sql);
}

header('location:listUserType.php');
?>