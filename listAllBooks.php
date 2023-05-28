<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LibraryPro</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>

      




<h2>LIST ALL BOOKS</h2>

<?php


include_once "db.php";

$search_term = isset($_REQUEST["query"]) ? $_REQUEST["query"] : "";
$sql = "SELECT * FROM books WHERE bookName LIKE '%$search_term%'";
$result = $conn->query($sql);
if($search_term){
while ($row1 = $result->fetch_assoc())
{
	echo "bookname: " . $row1["bookName"] . "<hr>"; //this.response text

}
}
$categoryId = isset($_REQUEST["categoryId"]) ? $_REQUEST["categoryId"] : null;
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : null;

if ($categoryId !== null) {
   
    $sql = "SELECT * FROM books WHERE categoryId = $categoryId";
	$dataset1 = $conn->query($sql);
    if ($dataset1) {
                      while($row = $dataset1->fetch_assoc()){
	                    echo "bookName: ".$row["bookName"] ."<br>"."price : " .$row["fees"]."<br>". "quantity : " .$row["quantity"]. "<br>".  "description : " .$row["descriptionbook"] ."<br>"."<hr>";
	                    echo "<a href=addToCart.php?bookId=" . $row["id"] . "> Add to Cart </a>";
	                    echo "<hr>";


}
}
}




?>








