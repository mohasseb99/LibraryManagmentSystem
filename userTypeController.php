<?php 
include_once "db.php"; 
include_once "helper.php"; 
include_once "userType.php";
include_once "userTypeView.php";


class userTypeController{
                 
    //$userTypeobj=new usertype(8);
    //$userid=$userTypeobj->getusertypeid();
    
    //$userTypeViewobj->ShowUserType(8);
    static function showuserType($usertypeid){
        $userTypeviewobj= new usertypeview();
        
       $usertypename= $userTypeviewobj->ShowUserType($usertypeid);
       echo $usertypename;
    }
} 

/********Testing*************/
 $usertypecontrollerobj=new userTypeController();
 $usertypecontrollerobj->showuserType(1);
?>