<?php

include_once "db.php";
$userTypeId = $_REQUEST["userTypeId"];
$sql= "SELECT * FROM user WHERE userTypeId = $userTypeId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc()){
	echo $row["fullName"] . " | <a href=showReaderborrowing.php?userId=" . $row["id"] . "> Show all borrowed books </a>   |  " ;
	echo "<a href=listBookCategory.php?userId=" . $row["id"] . "> Borrow books </a>";
	echo "   |   <a href=addUser.php?userId=" . $row["id"] . " > Edit User </a>";
	echo "   |   <a href=delete.php?id=" . $row["id"] . "&tableName=user> Delete </a>";
	echo "<hr>";
}


?>