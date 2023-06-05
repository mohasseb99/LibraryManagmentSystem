<?php
include_once "userType.php"; 
include_once "helper.php"; 
include_once "db.php"; 
include_once "address.php";
class   user{
    private $id;
    private $fullName;
    private $dateOfBirth;
    private $userTypeId;
    private $password;
    private $userName;
    private $cityid;

    function insertNewRecord(){
        $sql = "INSERT INTO user (cityid ,fullName, dateOfBirth, userTypeId, password, userName) VALUES ('this->cityid' ,'this->fullName', 'this->dateOfBirth', 'this->userTypeId', 'this->password', 'this->userName')";
        $conn=DB::getConnection();
        $conn->query($sql);
    
    }

    function UpdateRecord($id){
   	$sql = "UPDATE user SET 'this->cityid', 'this->userName', 'this->password', 'this->fullName' , 'this->dateOfBirth', 'this->userTypeId' WHERE id = $id";
    $conn=DB::getConnection();
     $conn->query($sql); 
    } 

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
        
        } 
    }

    public function getId(){
        return isset($this->id) ? $this->id : null;
    }


    public function setfullName($fullName){
        $this->fullName=$fullName;
    }
    public function getfullName(){
        return isset($this->fullName)? $this->fullName : null;
    }


    public function setdateofbirth($dateOfBirth){
        $this->dateOfBirth=$dateOfBirth;
    }
    public function getdateofbirth(){
        return isset($this->dateOfBirth)? $this->dateOfBirth : null;
    }


    public function setuserTypeid($userTypeId){
       $this->userTypeId= $userTypeId;
    }
    public function getuserTypeid(){
        return isset($this->userTypeId)? $this->userTypeId : null;
    } 


    public function setpassword($password){
       $this->password=$password;
    }
    public function getpassword(){
        return isset($this->password)? $this->password : null;
    }


    public function setusername($userName){
       $this->userName=$userName;
    }
    public function getusername(){
        return isset($this->userName)? $this->userName : null;
    }


    public function setcityid($cityid){
       $this->cityid=$cityid;
    }
    public function getcityid(){
        return isset($this->cityid)? $this->cityid : null;
    }
}

/***************testing **************** */
//$obj=new user(23);
//echo $obj->fullName;

?>