<?php
include_once "../view/header.php";
?>
<?php
include_once "../models/helper.php";
include_once "../models/books.php";
include_once "../view/booksview.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["command"]) && $_POST["command"] === "addbook") {
    // Retrieve form data
    $bookName = $_POST["bookName"];
    $categoryIdObj = $_POST["categoryId"];
    $quantity = $_POST["quantity"];
    $fees = $_POST["fees"];
    $description = $_POST["descriptionbook"];

    // Create a new books object
    $obj = new books();
$obj->setBookName($_POST["bookName"]);
$obj->setCategoryIdObj($_POST["categoryId"]);
$obj->setQuantity($_POST["quantity"]);
$obj->setFees($_POST["fees"]);
$obj->setDescriptionBook($_POST["descriptionbook"]);

// Call the addbook method
$obj->addbook();
}
$bookView = new booksview();
$bookView->addbook();

?>



<?php
include_once "../footer.php";
?>
