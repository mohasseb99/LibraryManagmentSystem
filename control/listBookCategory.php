<?php
include_once "../view/header.php";
?>
<?php
include_once "../models/books.php";
include_once "../view/booksview.php";
include_once "../models/helper.php";







$booksModel = new books();
$booksView = new booksview();
$booksView->LISTALlCATEGORY();
// Get the book categories
$resultDataSet = $booksModel->getBookCategories();
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : null;
$userId = 0;

if (isset($_SESSION["userTypeId"])) {
    $userId = $_SESSION["id"];
}

// Pass the data to the view for rendering
$booksModel->showBookCategories($resultDataSet, $userId);


$booksView->showSearchForm();

?>

<?php
include_once "../footer.php";
?>