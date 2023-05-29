<?php 
	include_once "../helper.php";
	include_once "pages.php";
		
	class staticcontent{
		private $id;
		private $pageIdObj;
		private $content;
		
		function __construct($pageId){
			if($pageId != ""){
				$conn = DB::getConnection();
				$sql = "select * from staticcontent where pageId = $pageId";
				$staticcontentDS = $conn->query($sql);
				$staticcontentObj = $staticcontentDS->fetch_assoc();
				$this->id = $staticcontentObj["id"];
				$this->content = $staticcontentObj["content"];
				$this->pageIdObj = new page($pageId);
			}
		}

		public function getId() {
		    return isset($this->id) ? $this->id : null;
	    }

		public function setPageIdObj($pageIdObj) {
			$this->pageIdObj = $pageIdObj;
		}

		public function getPageIdObj() {
		    return isset($this->pageIdObj) ? $this->pageIdObj : null;
	    }

		public function setContent($content) {
			$this->content = $content;
		}

		public function getContent() {
		    return isset($this->content) ? $this->content : null;
	    }
	}

	
	/*
	$obj = new staticcontent(9);
	echo $obj->getId();
	echo "<br>";
	echo $obj->getPageIdObj()->getFriendlyName();
	echo "<br>";
	echo $obj->getContent();
	*/
?>