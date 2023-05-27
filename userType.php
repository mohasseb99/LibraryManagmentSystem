<?php
include_once "helper.php"; 

class usertype{
    public $id;
    public $name;
    
    function __construct($Id){

        if($Id != ""){

            //$conn= new mysqli("localhost", "root","", "newdb");
            $conn=DB::getConnection();
            $sql="select * from usertype where id=".$Id;
            $userInfoDS = $conn->query($sql);
            $userInfoobj = $userInfoDS->fetch_assoc();
            $this->id=$userInfoobj["id"];
            $this->name=$userInfoobj["name"];

        }

    }    

}

/***************testing **************** */
//$obj=new usertype(1);
//echo $obj->name;
?>