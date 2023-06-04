<?php

//instead of writing $conn= new mysqli("localhost", "root","", "library_mysql"); each time we make include
//mysqli : it is an object that, that object is embedded inside the php language, that object open a new connection on the database 
//in order to retrieve information on the database 
// the connection allows us to execute, insert or update   
include_once "db.php";
include_once "header.php";
include_once "userTypeController.php";
include_once "users.php";
include_once "userController.php";

$userId = $_SESSION["id"];

/*$userobj  = new user($userId);
(int)$usertypeidnum=$userobj->getuserTypeid();*/

$objusercont=new UserController();
$objusercont->ShowUserInfo($userId);
$usertypeidnum=$objusercont->GetUserTypeidNum($userId);

$usertypecontrollerobj=new userTypeController();
$usertypecontrollerobj->showuserType($usertypeidnum);

//echo "testingggg" . $usertypeidnum;
/************************ Name **************************** */
echo "Your name:";
$sql= "SELECT * FROM user WHERE id = $userId";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
$fullName =$userInfoobj["fullName"];
echo $fullName ;
echo "<hr>";

/************************ User Name **************************** */
echo "Your user name:";
$sql= "SELECT * FROM user WHERE id = $userId";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
$UserName =$userInfoobj["userName"];
echo $UserName ;
echo "<hr>";

/************************ Date Of Birth **************************** */
echo "Date of birth:";
$sql= "SELECT * FROM user WHERE id = $userId";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
$BirthDate =$userInfoobj["dateOfBirth"];
echo $BirthDate ;
echo "<hr>";

/************************ User Type **************************** */
echo "Your type:";
/*$usertypecontrollerobj=new userTypeController();
$usertypecontrollerobj->showuserType($usertypeidnum);*/

/*$sql= "SELECT * FROM user WHERE id = $userId";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
$UserTypeNum =$userInfoobj["userTypeId"];

$sql= "SELECT * FROM usertype WHERE id = $UserTypeNum";
$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();
$UserType =$userInfoobj["name"];
echo $UserType ;
echo "<hr>";*/

/************************ Address **************************** */
echo "Your address is:";
$sql= "SELECT * FROM user WHERE id = $userId";

$userInfoDS = $conn->query($sql);
$userInfoobj = $userInfoDS->fetch_assoc();

$cityIdVar=$userInfoobj["cityid"];

while($cityIdVar != 0){
$sql2="SELECT * FROM address WHERE Id=$cityIdVar";
$addressdataset= $conn->query($sql2);
$firstrow = $addressdataset->fetch_assoc();
echo "$firstrow[name]  ";
$cityIdVar=$firstrow["parentid"];
}
echo "<hr>";

?>



<?php
include_once "footer.php";
?>