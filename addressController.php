<?php

include_once "db.php"; 
include_once "helper.php"; 
include_once "address.php"; 
class addressController{

    private $cityname1;
    private $cityname2;
    private $cityname3;


      function  ShowUserAddress($usercityid){
           
        $addressobj= new address( $usercityid);
        $addvar=$addressobj->getaddressid();
        if($addvar!=0){

            $cityname1=$addressobj->getcityname();
           // echo  $cityname1 . " ";
            $parentid1=$addressobj->getparentid();

            $addressobj2= new address($parentid1);
            $cityname2= $addressobj2->getcityname();
           // echo $cityname2 . " ";
            $parentid2=$addressobj2->getparentid();

            $addressobj3= new address($parentid2);
            $cityname3 =$addressobj3->getcityname();
            //echo $cityname3;

            return array($cityname1 , $cityname2 , $cityname3);
        }

  
       
       /*echo "Your address is:";
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
      echo "<hr>";*/

    }
}
/********************Testingggg******************* */
$objaddresscontroller= new addressController();
$array = $objaddresscontroller->ShowUserAddress(17);
echo $array[0] . " ";
echo $array[1] . " ";
echo $array[2];
?>