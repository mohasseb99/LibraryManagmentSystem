<?php
include_once "header.php";
include_once "controllers/staticcontentcontroller.php";
include_once "Encrypt.php";
?>

<?php
	$pageid = Encrypt::Decrypt($_REQUEST["pageid"], 3);
	showContent($pageid);


?>


  


<?php
include_once "footer.php";
?>
