<?php
include_once "../models/books.php";
include_once "../view/booksview.php";
include_once "../models/helper.php";

$booksModel = new books();
$booksView = new booksview();

$booksView->LISTALLBOOKS();

$categoryId = isset($_REQUEST["categoryId"]) ? $_REQUEST["categoryId"] : null;
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : null;

if ($categoryId !== null) {
    // Get the books based on the category ID
    $booksData = $booksModel->getBooksByCategoryId($categoryId,$userId);
    
    // Pass the data to the view for rendering
    $booksView->showBooks($booksData);
}




$searchTerm = isset($_GET["query"]) ? $_GET["query"] : "";

if (!empty($searchTerm)) {
    
    $resultDataSet = $booksModel->searchBooks($searchTerm);

    // Display the search results
    while ($row = $resultDataSet->fetch_assoc()) {
        echo "bookname: " . $row["bookName"] . "<hr>";
    }

}




?>
