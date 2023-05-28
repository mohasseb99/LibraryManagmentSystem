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





<?php
include_once "../db.php";

if (isset($_POST["bookName"], $_POST["categoryId"], $_POST["quantity"], $_POST["fees"], $_POST["descriptionbook"])) {
    $bookName = $_POST["bookName"];
    $categoryId = $_POST["categoryId"];
    $quantity = $_POST["quantity"];
    $fees = $_POST["fees"];
    $description = $_POST["descriptionbook"];

    // Validate input values if necessary

    if (!empty($_POST["bookId"])) {
        $bookId = $_POST["bookId"];
        $sql = "UPDATE books SET bookName = '$bookName', categoryId = '$categoryId', quantity = '$quantity', fees = '$fees', descriptionbook = '$description', available = '$quantity' WHERE id = $bookId";
    } else {
        $sql = "INSERT INTO books (bookName, categoryId, quantity, fees, descriptionbook, available) VALUES ('$bookName', '$categoryId', '$quantity', '$fees', '$description', '$quantity')";
    }

    if ($conn->query($sql)) {
        header('Location: listAllBooks.php',);
      
        
        exit();
    } 
    
} else {
    echo "Missing required input fields.";
}

?>