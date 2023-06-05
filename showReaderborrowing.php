

<?php
include_once "header.php";
include_once __DIR__ . "/controllers/borrowcontroller.php";
	$userId = $_SESSION["id"];
	showReaderBorrows($userId);
include_once "footer.php";
?>