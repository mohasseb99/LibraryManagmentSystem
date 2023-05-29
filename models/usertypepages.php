<?php 
	include_once "../helper.php";
	include_once "pages.php";
	include_once "userType.php";
		
	class usertypepages{
		private $Id;
		private $usertypeidObj;
		private $pageidObj;
		private $orderby;
		
		function __construct($Id){
			if($Id != ""){
				$conn = DB::getConnection();
				$sql = "select * from usertypepages where Id = $Id";
				$usertypepagesDS = $conn->query($sql);
				$usertypepagesObj = $usertypepagesDS->fetch_assoc();
				$this->Id = $usertypepagesObj["Id"];
				$this->orderby = $usertypepagesObj["orderby"];
				$this->pageidObj = new page($usertypepagesObj["pageid"]);
				$this->usertypeidObj = new usertype($usertypepagesObj["usertypeid"]);
			}
		}

		public function getId() {
		    return isset($this->Id) ? $this->Id : null;
	    }

		public function setPageidObj($pageidObj) {
			$this->pageidObj = $pageidObj;
		}

		public function getPageidObj() {
		    return isset($this->pageidObj) ? $this->pageidObj : null;
	    }

		public function setUsertypeidObj($usertypeidObj) {
			$this->usertypeidObj = $usertypeidObj;
		}

		public function getUsertypeidObj() {
		    return isset($this->usertypeidObj) ? $this->usertypeidObj : null;
	    }

		public function setOrderby($orderby) {
			$this->orderby = $orderby;
		}

		public function getOrderby() {
		    return isset($this->orderby) ? $this->orderby : null;
	    }
	}

	
	/*
	$obj = new usertypepages(24);
	echo $obj->getId();
	echo "<br>";
	echo $obj->getPageidObj()->getFriendlyName();
	echo "<br>";
	echo $obj->getOrderby();
	echo "<br>";
	echo $obj->getUsertypeidObj()->name;	
	*/
?>