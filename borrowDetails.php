

<?php
include_once "header.php";
include_once __DIR__ . "/controllers/borrowcontroller.php";
include_once "Encrypt.php";

	$borrowId = Encrypt::Decrypt($_REQUEST["bid"], 3);
	showBorrowDetails($borrowId);

?>



<?php
include_once "footer.php";
?>
