<?php
include_once "users.php";
include_once "userview.php";
include_once "db.php"; 
include_once "helper.php"; 
//include_once "userType.php";
//include_once "helper.php"; 

class UserController{
    function  ShowUserInfo($Id){
        //$Id=$_REQUEST["id"];
        
        $obj=new user($Id);
        $userViewobj= new userview();
        $userViewobj->showuserInfoo($obj);
    }

  
    function AddUser($id){

        $FullName=$_REQUEST["fullName"];
        $DOB=$_REQUEST["dateOfBirth"];
        $userTypeId=$_REQUEST["userTypeId"];
        $Password=$_REQUEST["password"];
        $Username=$_REQUEST["userName"];
        $CityId=$_REQUEST["cityid"];
        $obj= new user($id);
        /*$obj->fullName=$FullName;
        $obj->dateOfBirth=$DOB;
        $obj->userTypeId=$userTypeId;
        $obj->password=$Password;
        $obj->userName=$Username;
        $obj->cityid=$CityId;*/
        $obj->setfullName($FullName);
        $obj->setdateofbirth($DOB);
        $obj->setuserTypeid($userTypeId);
        $obj->setpassword($Password);
        $obj->setusername($Username);
        $obj->setcityid($CityId);
        $obj->insertNewRecord();
    }

    function GetUserTypeidNum($userId){

        $objuser=new user($userId);
        return $objuser->getuserTypeid();
    }

    }

/*if("ShowInfo"==$_REQUEST["command"]){

    $obj=new UserController();
    $obj->ShowUserInfo();
}

if("add"==$_REQUEST["command"]){
    $objadduser = new UserController();
    $objadduser->AddUser($id);
}*/
/*$obj=new UserController();
$usertypeid =$obj->GetUserTypeidNum(23);
echo $usertypeid;*/
?>