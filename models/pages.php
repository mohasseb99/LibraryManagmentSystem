<?php 
	include_once __DIR__ . "/../helper.php";
	
	class page{
		private $Id;
		private $FriendlyName;
		private $PhysicalAddress;
		private $static;
		private $parentId;

		function __construct($Id){
			if($Id != ""){
				$conn = DB::getConnection();
				$sql = "select * from pages where Id = $Id";
				$pagesDS = $conn->query($sql);
				$pagesObj = $pagesDS->fetch_assoc();
				$this->Id = $pagesObj["Id"];
				$this->FriendlyName = $pagesObj["FriendlyName"];
				$this->PhysicalAddress = $pagesObj["PhysicalAddress"];
				$this->static = $pagesObj["static"];
				$this->parentId = $pagesObj["parentId"];
			}
		}

		public function getId() {
		    return isset($this->Id) ? $this->Id : null;
	    }

		public function setFriendlyName($FriendlyName) {
			$this->FriendlyName = $FriendlyName;
		}

		public function getFriendlyName() {
		    return isset($this->FriendlyName) ? $this->FriendlyName : null;
	    }

		public function setPhysicalAddress($PhysicalAddress) {
			$this->PhysicalAddress = $PhysicalAddress;
		}

		public function getPhysicalAddress() {
		    return isset($this->PhysicalAddress) ? $this->PhysicalAddress : null;
	    }

		public function setStatic($static) {
			$this->static = $static;
		}

		public function getStatic() {
		    return isset($this->static) ? $this->static : null;
	    }

		public function setParentId($parentId) {
			$this->parentId = $parentId;
		}

		public function getParentId() {
		    if(isset($this->parentId)){
				return new page($this->parentId);
			}
	    }

	}

	
	/*
	$obj = new page(2);
	echo $obj->getId();
	echo "<br>";
	echo $obj->getFriendlyName();
	echo "<br>";
	echo $obj->getPhysicalAddress();
	*/
?>