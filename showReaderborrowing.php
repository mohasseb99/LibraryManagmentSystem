<table border = 1>




<?php
include_once "db.php";

$userId = $_REQUEST["userId"];

$sql = "SELECT * from user where id = $userId";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
?>
<tr>
	<td> Reader Full Name </td> 
	<td> <?php echo $userInfoobj["fullName"]; ?> </td>
</tr>

<?php

$sql = "SELECT * FROM borrow WHERE readerId= $userId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc())
{	
	echo "<tr><td>borrow date </td><td><a href=borrowDetails.php?bid=" . $row["id"] . ">" . $row["borrowDate"] . "</a></td>";
	echo "<td><a href=delete.php?id=" . $row["id"] . "&tableName=borrow> Delete </a> </td>";
	echo "</tr>";



}



?>

</table>
