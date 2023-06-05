<?php 
	include_once __DIR__ . "/../helper.php";
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
				$this->IsDeleted = $borrowdetailsObj["IsDeleted"];
				$this->CreatedAt = $borrowdetailsObj["CreatedAt"];
				$this->UpdatedAt = $borrowdetailsObj["UpdatedAt"];
				$this->borrowIdObj = new borrow($borrowdetailsObj["borrowId"]);
				$this->bookIdObj = new books($borrowdetailsObj["bookId"]);
			}
		}

		public function getIsDeleted(){
			return isset($this->IsDeleted) ? $this->IsDeleted: null;
		}

		public function setIsDeleted($IsDeleted){
			$this->IsDeleted = $IsDeleted;
		}

		public function getCreatedAt(){
			return isset($this->CreatedAt) ? $this->CreatedAt: null;
		}

		public function setCreatedAt($CreatedAt){
			$this->CreatedAt = $CreatedAt;
		}

		public function getUpdatedAt(){
			return isset($this->UpdatedAt) ? $this->UpdatedAt: null;
		}

		public function setUpdatedAt($UpdatedAt){
			$this->UpdatedAt = $UpdatedAt;
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

		public static function getBorrowDetails($borrowId){
			$IsDeleted = 0;
			$sql = "SELECT * FROM borrowdetails WHERE borrowId= $borrowId AND IsDeleted = $IsDeleted";
			$conn = DB::getConnection();
			$dataset = $conn->query($sql);
			$borrowDetails = array(); 
			while($row = $dataset->fetch_assoc())
			{	
				array_push($borrowDetails, new borrowdetails($row["id"]));
			}
			return $borrowDetails;
		}

		public function deleteBorrowDetails(){
			$timestamp = time();
			$formattedDateTime = date('Y-m-d H:i:s', $timestamp);
			$IsDeleted = 1;

			$sql = "UPDATE borrowdetails SET IsDeleted = $IsDeleted, UpdatedAt = '$formattedDateTime' WHERE id= $this->id";
			$conn = DB::getConnection();
			$conn->query($sql);
		}

		public static function addNewBorrowDetails($bookId, $borrowId){
			$conn = DB::getConnection();
			$timestamp = time();
			$formattedDateTime = date('Y-m-d H:i:s', $timestamp);
			
			$sql = "insert into borrowdetails (borrowId, bookId, CreatedAt, UpdatedAt) values ($borrowId, $bookId, '$formattedDateTime', '$formattedDateTime')";
			$conn->query($sql);
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