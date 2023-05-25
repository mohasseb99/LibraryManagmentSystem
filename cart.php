
<?php
// Start session
include_once "header.php";

?>
<table border = 1 width = 100%>

<tr><td width = 30%> Book Name </td> <td width = 30%> Category Name </td> <td width = 30%> Book image </td> </tr>

<?php
// Check if cart exists in session
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    
    // Display cart contents
    if (!empty($cart)) {
        // Fetch book details from the database based on IDs in the cart array
        $sql = "SELECT * FROM books WHERE id IN (".implode(',', $cart).")";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT * FROM books, bookcategory 
			            WHERE books.id =" . $row["id"] . " and books.categoryId = bookcategory.id";
	            $bookDataset = $conn->query($sql);
	            $bookObj=$bookDataset->fetch_assoc();
                ?>
	            <tr><td><?php echo $bookObj["bookName"]; ?></td> <td><?php echo $bookObj["name"]; ?> </td>
                <?php
	            $sql = "select * from bookfile where bookId=". $row["id"];
	            $fileDataSet = $conn->query($sql);
                ?><td> <?php
	            while($rowFile = $fileDataSet->fetch_assoc()){
                    
		            echo "<img src=" . $rowFile["filePath"] . ">"; 
	            }
                ?> </td> </tr> <?php
            }
            echo "<a href=addToBorrow.php> Borrow these books </a>";
	        echo "<hr>";
            echo "<a href='clearCart.php'>Clear Cart</a>";
        } else {
            echo "No books found in the cart.";
        }
    } else {
        echo "Your cart is empty.";
    }

} else {
    echo "Your cart is empty.";
}
?>

</table>

<?php
// Start session
include_once "footer.php";

?>
