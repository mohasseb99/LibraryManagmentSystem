<?php 
	include_once "../helper.php";
	include_once "borrow.php";
	include_once "books.php";

	class borrowdetails{
		private $id;
		private $borrowIdObj;
		private $bookIdObj;

		function __construct($id){
			if($id != ""){
				$conn = DB::getConnection();
				$sql = "select * from borrowdetails where id = $id";
				$borrowdetailsDS = $conn->query($sql);
				$borrowdetailsObj = $borrowdetailsDS->fetch_assoc();
				$this->id = $borrowdetailsObj["id"];
				$this->borrowIdObj = new borrow($borrowdetailsObj["borrowId"]);
				$this->bookIdObj = new books($borrowdetailsObj["bookId"]);
			}
		}

		public function setBorrowIdObj($borrowIdObj) {
			$this->borrowIdObj = $borrowIdObj;
		}

		public function setBookIdObj($bookIdObj) {
			$this->bookIdObj = $bookIdObj;
		}

		public function getId() {
		    return isset($this->id) ? $this->id : null;
	    }

		public function getBorrowIdObj() {
		    return isset($this->borrowIdObj) ? $this->borrowIdObj : null;
	    }

		public function getBookIdObj() {
		    return isset($this->bookIdObj) ? $this->bookIdObj : null;
	    }
	}

	
	/*
	$obj = new borrowdetails(25);
	echo $obj->getId();
	echo "<br>";
	echo $obj->getBookIdObj()->getBookName();
	echo "<br>";
	echo $obj->getBorrowIdObj()->getId();
	echo "<br>";
	echo $obj->getBorrowIdObj()->getBorrowDate();
	*/
?>