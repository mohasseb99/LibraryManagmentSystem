<?php 

include_once "db.php";
session_start();

$bookId = $_REQUEST["bookId"];
$userId = $_SESSION["id"];

// Check if cart exists in session, if not, initialize it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


// Add the book ID to the cart array
$_SESSION['cart'][] = $bookId;

// Redirect back to the books listing page
header("Location: listBookCategory.php");

?>