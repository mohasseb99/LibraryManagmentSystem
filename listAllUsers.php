<?php

//instead of writing $conn= new mysqli("localhost", "root","", "library_mysql"); each time we make include
//mysqli : it is an object that, that object is embedded inside the php language, that object open a new connection on the database 
//in order to retrieve information on the database 
// the connection allows us to execute, insert or update   
include_once "db.php";

	//here we recieve the number userTypeId from other page which is listUserType when the user click on a certain hyperlink       
    $userTypeId = $_REQUEST["userTypeId"];

	//write the query
	// we use $userTypeId instead of typing a number so to prevent hard code 
	//Note: till now we do not have anything that can relate that connection with that query
	//so till now the query is not executed 
    $sql= "SELECT * FROM user WHERE userTypeId = $userTypeId";


	//$conn->query: here occurs the execution of that query
	//$conn->query: returns a table
	//the table that will be returned is called the dataset   
    $dataset = $conn->query($sql);
	
while($row = $dataset->fetch_assoc()){
	echo $row["fullName"] . " | <a href=showReaderborrowing.php?userId=" . $row["id"] . "> Show all borrowed books </a>   |  " ;
	echo "<a href=listBookCategory.php?userId=" . $row["id"] . "> Borrow books </a>";
	echo "   |   <a href=addUser.php?userId=" . $row["id"] . " > Edit User </a>";
	echo "   |   <a href=delete.php?id=" . $row["id"] . "&tableName=user> Delete </a>";
	echo "   |   <a href=listUserAdress.php?id=" . $row["userTypeId"] . ">get Address</a>";
	echo "<hr>";
}


?>