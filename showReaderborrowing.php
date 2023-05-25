

<?php
include_once "header.php";
?>


<table border = 1 width = "100%">




<?php

$userId = $_SESSION["id"];

$sql = "SELECT * from user where id = $userId";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
?>
<tr>
	<td width = "50%"> Reader Full Name </td> 
	<td width = "50%"> <?php echo $userInfoobj["fullName"]; ?> </td>
</tr>

<?php

$sql = "SELECT * FROM borrow WHERE readerId= $userId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc())
{	
	echo "<tr><td>borrow date </td><td><a href=borrowDetails.php?bid=" . $row["id"] . ">" . $row["borrowDate"] . "</a></td>";
	echo "<td><a href=deleteBorrow.php?id=" . $row["id"] . "> Delete </a> </td>";
	echo "</tr>";



}



?>

</table>



<?php
include_once "footer.php";
?>