<?php
include_once "userType.php"; 
include_once "helper.php"; 
class user{
    public $id;
    public $fullName;
    public $dateOfBirth;
    public $userTypeId;
    public $password;
    public $userName;
    public $cityid;

    function __construct($Id){

        if($Id != ""){
           // $conn= new mysqli("localhost", "root","", "newdb");
            $conn=DB::getConnection();
            $sql="select * from user where id=".$Id;
            $userInfoDS = $conn->query($sql);
            $userInfoobj = $userInfoDS->fetch_assoc();
            $this->id=$userInfoobj["id"];
            $this->fullName=$userInfoobj["fullName"];
            $this->dateOfBirth=$userInfoobj["dateOfBirth"];
            $this->userTypeId=$userInfoobj["userTypeId"];
            $this->password=$userInfoobj["password"];
            $this->userName=$userInfoobj["userName"];
            $this->cityid=$userInfoobj["cityid"];
            $this->userTypeId=new usertype($userInfoobj["userTypeId"]);

        }
    }

}

/***************testing **************** */
$obj=new user(23);
echo $obj->fullName;

?>