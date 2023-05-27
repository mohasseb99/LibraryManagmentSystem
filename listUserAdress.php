<?php

//instead of writing $conn= new mysqli("localhost", "root","", "library_mysql"); each time we make include
//mysqli : it is an object that, that object is embedded inside the php language, that object open a new connection on the database 
//in order to retrieve information on the database 
// the connection allows us to execute, insert or update   
include_once "db.php";

$userId = $_REQUEST["id"];

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



//getAddress($cityIdVar);


  /* function getAddress($cityIdVar){
   
    if($cityIdVar == 0){
        return "";
    }

    else{
        $secondquery="SELECT * FROM address WHERE Id=$cityIdVar";
        $addressdataset= $conn->query($secondquery);
        $firstrow = $addressdataset->fetch_assoc();
        echo "$firstrow[name]  ";
        $cityIdVar=$firstrow["parentid"];
        getAddress($cityIdVar);
    }
}*/

?>