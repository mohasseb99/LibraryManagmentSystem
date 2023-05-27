<?php
include_once "users.php";
include_once "userview.php";
include_once "db.php"; 
//include_once "userType.php";
//include_once "helper.php"; 
$id=$_REQUEST["id"];
$obj= new user($id);
$userobj= new userview();
$userobj->showuserInfo($obj);

?>