<?php
include_once "db.php";
session_start();/**to use the session */
//echo $_SESSION["fullName"];

$userName = $_REQUEST["userName"];
$password = $_REQUEST["password"];
//$hashResult =$sha1("$password");

$sql= "SELECT * FROM user WHERE userName = '$userName' and password = '$password'" ;
$dataset = $conn->query($sql);

if($row = $dataset->fetch_assoc()){
	echo "user is registered  ". $row["fullName"];
	echo $row["fullName"] . " | <a href=showReaderborrowing.php?userId=" . $row["id"] . "> Show all borrowed books </a>   |  " ;
	echo "<a href=listBookCategory.php?userId=" . $row["id"] . "> Borrow books </a>";
	echo "   |   <a href=addUser.php?userId=" . $row["id"] . " > Edit User </a>";
	echo "   |   <a href=delete.php?id=" . $row["id"] . "&tableName=user> Delete </a>";
	echo "   |   <a href=listUserAdress.php?id=" . $row["id"] . ">get Address</a>";
	echo "<hr>";

	/**global variable concerned with one person only*/
	$_SESSION["id"] = $row["id"];


	echo"Menu";
	$sql ="SELECT * FROM usertypepages WHERE usertypeid =".$row["id"] ; 
    $dataset2=$conn->query($sql);

	while($row2=$dataset2->fetch_assoc()){

		$sql="SELECT * FROM pages WHERE Id = ".$row2["pageid"];
		$dataset3=$conn->query($sql);
		$row3=$dataset3->fetch_assoc();
		echo $row3["FriendlyName"];
		?>

       <a href ="<?php echo $row3["PhysicalAddress"]; ?>"></a>
		
		  <br/><br/>

		 <?php
		 
	}

	
}
	
else{
	echo "user not registered";
}


?>