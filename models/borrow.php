<?php 
	include_once "../helper.php";
	include_once "users.php";

	class borrow{
		private $id;
		private $readerIdObj;
		private $borrowDate;

		function __construct($id){
			if($id != ""){
				$conn = DB::getConnection();
				$sql = "select * from borrow where id = $id";
				$borrowDS = $conn->query($sql);
				$borrowObj = $borrowDS->fetch_assoc();
				$this->id = $borrowObj["id"];
				$this->borrowDate = $borrowObj["borrowDate"];
				$this->readerIdObj = new user($borrowObj["readerId"]);
			}
		}

		public function setBorrowDate($borrowDate) {
			$this->borrowDate = $borrowDate;
		}

		public function setReaderIdObj($readerIdObj) {
			$this->readerIdObj = $readerIdObj;
		}

		public function getId() {
		    return isset($this->id) ? $this->id : null;
	    }

		public function getBorrowDate() {
		    return isset($this->borrowDate) ? $this->borrowDate : null;
	    }

		public function getReaderIdObj() {
		    return isset($this->readerIdObj) ? $this->readerIdObj : null;
	    }
	}

	/*
	$obj = new borrow(24);
	echo $obj->getId();
	echo "<br>";
	echo $obj->getReaderIdObj()->fullName;
	echo "<br>";
	echo $obj->getBorrowDate();
	*/
?>