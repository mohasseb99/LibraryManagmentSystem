<?php
include_once "db.php"; 
include_once "helper.php"; 
include_once "userType.php";
include_once "users.php";
class usertypeview{

    static function  ShowUserType($usertypenum){

        $userTypeobj=new usertype($usertypenum);
        $usertypename=$userTypeobj->getusertypename();
        return $usertypename;
    }
}
/*$Id=$_REQUEST["Id"];
$obj1=new usertype($Id);
$objuser=usertypeview::ShowUserType($obj1);*/
?>