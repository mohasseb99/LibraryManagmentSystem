<?php
include_once "db.php";
$sqlstmtUserTypes = "SELECT * FROM usertype";
$resultDataSet = $conn->query($sqlstmtUserTypes);

if(isset($_REQUEST["userId"])){
	$userId = $_REQUEST["userId"];
	$sql = "SELECT * from user where id = $userId";
	$userInfoDS = $conn->query($sql);
	$userInfoobj = $userInfoDS->fetch_assoc();
}
else{

}

?>



<form action=addUserdb.php method="POST">
	FullName <input type=text name="fullName" value="<?php echo @$userInfoobj["fullName"] ?>"> <br>
	username <input type=text name="userName" value="<?php echo @$userInfoobj["userName"] ?>"> <br>
	Date of Birth <input type=text name="dateOfBirth" value="<?php echo @$userInfoobj["dateOfBirth"] ?>"> <br>
	Password <input type=password name="password" value="<?php echo @$userInfoobj["password"] ?>"> <br>
	<select name="userTypeId">
		<?php
			while ($row = $resultDataSet->fetch_assoc())
			{
				if(isset($userInfoobj)){
					if($row["id"] == $userInfoobj["userTypeId"]){
						echo "<option selected value=" .$row["id"] . ">" . $row["name"] . "</option>";
					}
				}
				else{
					echo "<option value=" . $row["id"] .  ">" . $row["name"] . "</option>";
				}
			}
		?>
	</select> <br>
	<input type="hidden" name="userId" value="<?php echo @$userId; ?>">
	<input type="submit">
</form>