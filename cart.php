
<?php
// Start session
include_once "header.php";
include_once __DIR__ . "/models/books.php";
include_once __DIR__ . "/models/bookfile.php";
include_once "Encrypt.php";


?>
<table border = 1 width = 100%>

<tr><td width = 30%> Book Name </td> <td width = 30%> Category Name </td> <td width = 30%> Book image </td> </tr>

<?php
// Check if cart exists in session
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    
    // Display cart contents
    if (!empty($cart)) {
        $books = array();
        foreach ($cart as $bookId){
			array_push($books, new books($bookId));
		}

        $length = count($books); 
        if ($length > 0) {
            for($i = 0; $i < $length; $i++) {
                ?>
	            <tr><td><?php echo $books[$i]->getBookName(); ?></td> <td><?php echo $books[$i]->getCategoryIdObj()->getName(); ?> </td>
                <?php
                $bookFile = bookfile::getObjectByBookId($books[$i]->getID());
                ?><td> <?php
	            echo "<img src=" . $bookFile->getFilePath() . ">"; 
                ?> </td> </tr> <?php
            }
            ?>
            </table>
            <?php
            $enc = Encrypt::Encrypt("add", 3);
            echo "<a style='float:right' href=controllers/borrowcontroller.php?command=" . $enc . "> Borrow these books </a>";	        
            echo "<br>";
            echo "<a style='float:right' href='clearCart.php'>Clear Cart</a>";
        } else {
            echo "No books found in the cart.";
        }
    } else {
        echo "Your cart is empty.";
    }

} else {
    echo "Your cart is empty.";
}
include_once "footer.php";

?>

