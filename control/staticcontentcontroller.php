<?php 
	include_once __DIR__ . "/../models/staticcontent.php";
	include_once __DIR__ . "/../views/staticcontentview.php";

	function showContent($pageid){
		$staticPage = new staticcontent($pageid);
		$staticView = new staticcontentView();
		$staticView->showStaticContent($staticPage);
	}


?>