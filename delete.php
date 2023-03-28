<?php 

include_once "db.php";
$tableName = $_REQUEST["tableName"];
$id = $_REQUEST["id"];

$sql = "delete from $tableName where id = ". $id;
$conn->query($sql);













?>