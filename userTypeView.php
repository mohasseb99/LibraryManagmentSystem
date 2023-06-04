<?php
include_once "db.php"; 
include_once "helper.php"; 
include_once "userType.php";
include_once "users.php";
class usertypeview{

    static function  ShowUserType($usertypeobj){

       /* $userTypeobj=new usertype($usertypenum);
        $usertypename=$userTypeobj->getusertypename();
        return $usertypename;*/
        $usertypename=$usertypeobj->getusertypename();
        //echo $usertypename;
        ?>
        <table border=2, cellpadding=7m cellspacing =9, width=800 >
            <tr>
            <th width = 200>User Type</th>
            <td><?php echo $usertypename; ?></td> 
            </tr>
        </table> 
            <?php 

    }
}

/*$Id=$_REQUEST["Id"];
$obj1=new usertype($Id);
$objuser=usertypeview::ShowUserType($obj1);*/
?>