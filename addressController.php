<?php

include_once "db.php"; 
include_once "helper.php"; 
include_once "address.php"; 
include_once "addressview.php";
class addressController{
      
    private $cityname1;
    private $cityname2;
    private $cityname3;

     public function setcityname1($cityname1){
        $this->$cityname1=$cityname1;
    }

   public function setcityname2($cityname2){
    $this->$cityname2=$cityname2;
   }

public function setcityname3($cityname3){
    $this->$cityname3=$cityname3;
 }

 public function getcityname1(){
    return isset($this->cityname1)? $this->cityname1 : null;
    }

public function getcityname2(){
    return isset($this->cityname2)? $this->cityname2 : null;
 }

 public function getcityname3(){
    return isset($this->cityname3)? $this->cityname3 : null;
 }


   public function  ComputeFullAddress($usercityid){
           
        $addressobj= new address( $usercityid);
        $addvar=$addressobj->getaddressid();
        if($addvar!=0 ){

            $cityname1=$addressobj->getcityname();
            //echo  $cityname1 . " ";
            $parentid1=$addressobj->getparentid();

            $addressobj2= new address($parentid1);
            $cityname2= $addressobj2->getcityname();
            //echo $cityname2 . " ";
            $parentid2=$addressobj2->getparentid();

            $addressobj3= new address($parentid2);
            $cityname3 =$addressobj3->getcityname();
             //echo $cityname3;

            return array($cityname1 , $cityname2 , $cityname3);
        }
    }

          function ShowFullAddress($usercityid){

            $userviewobj=new Addressview();
     
            $userviewobj->PrintUserAddress($usercityid);
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

/********************Testingggg******************* */
//$objaddresscontroller= new addressController();
//$objaddresscontroller->ComputeFullAddress(17);
//$objaddresscontroller->ShowFullAddress(17);
/*$city1= $objaddresscontroller->getcityname1();
echo $city1 ." ";
$city2= $objaddresscontroller->getcityname2();
echo $city2 ." ";
$city3= $objaddresscontroller->getcityname3();
echo $city3 ." ";

/*echo $array[0] . " ";
echo $array[1] . " ";
echo $array[2];*/
?>