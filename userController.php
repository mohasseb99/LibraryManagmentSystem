<?php
include_once "users.php";
include_once "userview.php";
include_once "db.php"; 
include_once "helper.php"; 
//include_once "userType.php";
//include_once "helper.php"; 

class UserController{
    function ShowUserInfo(){
        $Id=$_REQUEST["id"];
        $obj=new user($Id);
        $userViewobj= new userview();
        $userViewobj->showuserInfo($obj);
    }
}

if("ShowInfo"==$_REQUEST["command"]){

    $obj=new UserController();
    $obj->ShowUserInfo();
}

if("add"==$_REQUEST["command"]){

    $FullName=$_REQUEST["fullName"];
    $DOB=$_REQUEST["dateOfBirth"];
    $userTypeId=$_REQUEST["userTypeId"];
    $Password=$_REQUEST["password"];
    $Username=$_REQUEST["userName"];
    $CityId=$_REQUEST["cityid"];
    $obj= new user($id);
    $obj->fullName=$FullName;
    $obj->dateOfBirth=$DOB;
    $obj->userTypeId=$userTypeId;
    $obj->password=$Password;
    $obj->userName=$Username;
    $obj->cityid=$CityId;
    $obj->insertNewRecord();
}
?>