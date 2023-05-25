<?php
// Start session
session_start();

// Clear the cart array
$_SESSION['cart'] = array();

// Redirect back to the cart page or any other page
header("Location: listBookCategory.php");
?>