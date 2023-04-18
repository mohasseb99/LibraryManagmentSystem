<?php

include_once "db.php";

$search_term = $_POST['search'];
$sql = "SELECT * FROM books WHERE bookName LIKE '%$search_term%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "book found";
  } else {
	echo "book not found sorry!. we will add it soon ";
  }


$categoryId =$_REQUEST["categoryId"];


$sql= "SELECT * FROM books WHERE categoryId =$categoryId";
$dataset1 = $conn->query($sql);
    
while($row = $dataset1->fetch_assoc()){
echo "bookName: ".$row["bookName"] ."<br>"."price : " .$row["fees"]."<br>". "quantity : " .$row["quantity"]. "<br>".  "description : " .$row["descriptionbook"] ."<br>"."<hr>";


}











//echo "<a href=listBookCategory.php?userId=" . $row["id"] . "> Borrow books </a>";
//echo "   |   <a href=addUser.php?userId=" . $row["id"] . " > Edit User </a>";
//echo "   |   <a href=delete.php?id=" . $row["id"] . "&tableName=user> Delete </a>";
//echo "<hr>";





?>

<form method="POST" action="listAllBooks.php">
 <input type="text" name="search" placeholder="Search by book name...">
  <button type="submit">Search</button><br>
  














