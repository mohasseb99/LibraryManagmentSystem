<?php 
	include_once __DIR__ . "/../helper.php";
	include_once "users.php";

	class borrow{
		private $id;
		private $readerIdObj;
		private $borrowDate;
		private $IsDeleted;
		private $CreatedAt;
		private $UpdatedAt;

		function __construct($id){
			if($id != ""){
				$conn = DB::getConnection();
				$sql = "select * from borrow where id = $id";
				$borrowDS = $conn->query($sql);
				$borrowObj = $borrowDS->fetch_assoc();
				$this->id = $borrowObj["id"];
				$this->borrowDate = $borrowObj["borrowDate"];
				$this->readerIdObj = new user($borrowObj["readerId"]);
				$this->IsDeleted = $borrowObj["IsDeleted"];
				$this->CreatedAt = $borrowObj["CreatedAt"];
				$this->UpdatedAt = $borrowObj["UpdatedAt"];
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

		public static function getBorrowsUser($userId){
			$IsDeleted = 0;
			$sql = "SELECT * FROM borrow WHERE readerId= $userId AND IsDeleted = $IsDeleted";
			$conn = DB::getConnection();
			$dataset = $conn->query($sql);
			$borrows = array(); 
			while($row = $dataset->fetch_assoc())
			{	
				array_push($borrows, new borrow($row["id"]));
			}
			return $borrows;
		}

		public function deleteBorrow(){
			$timestamp = time();
			$formattedDateTime = date('Y-m-d H:i:s', $timestamp);
			$IsDeleted = 1;

			// UPDATE books SET available = $ava WHERE id = $this->id
			$sql = "UPDATE borrow SET IsDeleted = $IsDeleted, UpdatedAt = '$formattedDateTime' WHERE id= $this->id";
			$conn = DB::getConnection();
			$conn->query($sql);
		}

		public static function addNewBorrow($userId){
			$conn = DB::getConnection();
			$timestamp = time();
			$formattedDateTime = date('Y-m-d H:i:s', $timestamp);
			$borrowDate = date('Y-m-d');
			$sql = "insert into borrow (readerId, borrowDate, CreatedAt, UpdatedAt) values ($userId, '$borrowDate', '$formattedDateTime', '$formattedDateTime')";
			$conn->query($sql);
			$borrowId = $conn->insert_id;
			return $borrowId;
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

	/*
	$borrows = borrow::getBorrowsUser(1);
	echo $borrows[0]->getId();
	echo "<br>";
	echo $borrows[0]->getReaderIdObj()->fullName;
	*/
?>