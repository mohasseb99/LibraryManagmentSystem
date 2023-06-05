<?php 
	include_once __DIR__ . "/../models/borrowdetails.php";
	include_once __DIR__ . "/../views/borrowdetailsview.php";
	include_once __DIR__ . "/../models/books.php";

	function getBorrowDetails($borrowId){
		$borrowDetails = borrowdetails::getBorrowDetails($borrowId);
		return $borrowDetails;
	}

	function showBorrowDetails($borrowId){
		$borrowDetails = borrowdetails::getBorrowDetails($borrowId);
		$borrowDetailsView = new borrowDetailsView();
		$borrowDetailsView->showBorrowDetails($borrowDetails);
	}

	function addNewBorrowDetailsController($bookId, $borrowId){
		$bookObj = new books($bookId);
		if($bookObj->canBorrow()){
			borrowdetails::addNewBorrowDetails($bookId, $borrowId);
		}
	}


?>
