<?php 
	include_once __DIR__ . "/../models/borrow.php";
	include_once __DIR__ . "/../views/borrowview.php";
	include_once __DIR__ . "/../controllers/borrowdetailscontroller.php";
	include_once __DIR__ . "/../Encrypt.php";

	session_start();

	function showReaderBorrows($userId){
		$borrows = borrow::getBorrowsUser($userId);
		$borrowViewObj = new borrowView();
		$borrowViewObj->showBorrowInfo($borrows);
	}

	function deleteBorrow(){
		$borrowId = Encrypt::Decrypt($_REQUEST["id"], 3);
		$borrowDetails = getBorrowDetails($borrowId);

		for($i = 0; $i < count($borrowDetails); $i++){
			$borrowDetails[$i]->getBookIdObj()->returnBook();
			$borrowDetails[$i]->deleteBorrowDetails();
		}

		$borrow = new borrow($borrowId);	
		$borrow->deleteBorrow();
		header('location:../showReaderborrowing.php');
	}

	if(isset($_REQUEST['command'])){
		$command = Encrypt::Decrypt($_REQUEST['command'], 3);
		if($command == "delete"){
			deleteBorrow();
		}
	}

	if(isset($_REQUEST['command'])){
		$command = Encrypt::Decrypt($_REQUEST['command'], 3);
		if($command == "add"){
			$userId = $_SESSION["id"];
			$borrowId = borrow::addNewBorrow($userId);
			$cart = $_SESSION['cart'];

			foreach ($cart as $bookId){
				addNewBorrowDetailsController($bookId, $borrowId);
			}			 

			header("Location: ../clearCart.php");
		}
	}
	
	//showReaderBorrows(23);
?>
