<?php 

   /****************************** Description of the code ************************************************/
    /*When the user presses the submit button in the html form it direct us to that code 
     The role of that code is to insert the information that the user enters into the database table named user*/
    /******************************************************************************************************/

   //instead of writing $conn= new mysqli("localhost", "root","", "library_mysql"); each time we make include 
   //mysqli : it is an object that, that object is embedded inside the php language, that object open a new connection on the database 
   //in order to retrieve information on the database 
   // the connection allows us to execute, insert or update   
   include_once ("db.php");
   include_once "userController.php";

/*if we send the data with the Get method we can use $_GET[] 
if we send the data with the host method we can use $_HOST[] 
if we do not know the data is sent by get or host we use $_REQUEST[]   */
// these four lines is for recieving the data that the user enters in the form 
//NOTE: here these lines allows us to convert from the data representation to the object representation 
$fullName = $_REQUEST["fullName"];
$dateOfBirth = $_REQUEST["dateOfBirth"];
$userTypeId = $_REQUEST["userTypeId"];
$password = $_REQUEST["password"];
$userName = $_REQUEST["userName"];
$cityNum=$_REQUEST["cityid"];

if($_REQUEST["userId"] != ""){
   /*$userId = $_REQUEST["userId"];
   $usercontrollerobj=new UserController();
   $usercontrollerobj->UpdateUser($userId);*/
  // $usercontrollerobj->UpdateUser($userId);
   
	$userId = $_REQUEST["userId"];

 
	$sql = "UPDATE user SET cityid ='$cityNum', userName = '$userName', password = '$password', fullName = '$fullName', dateOfBirth = '$dateOfBirth', userTypeId = '$userTypeId' WHERE id = $userId";
    $conn->query($sql); 
}
else{
   /* $userId = $_REQUEST["userId"];
    $usercontrollerobj=new UserController();
    $usercontrollerobj->AddUser();*/
    
	$sql = "insert into user (cityid ,fullName, dateOfBirth, userTypeId, password, userName) values ('$cityNum' ,'$fullName', '$dateOfBirth', '$userTypeId', '$password', '$userName')";
	$conn->query($sql);
}


?>