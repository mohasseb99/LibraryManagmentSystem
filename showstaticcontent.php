<?php
include_once "header.php";
?>

<?php

include_once "db.php";
$pageid = $_REQUEST["pageid"];
$sql = "select * from staticcontent where pageId = $pageid";

$dataset = $conn->query($sql);
$row = $dataset->fetch_assoc();
echo $row["content"];

?>


  


<?php
include_once "footer.php";
?>
