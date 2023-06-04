
<?php
include_once "helper.php"; 
include_once "db.php"; 

class address{

    private $Id;
    private $name;
    private $parentid;

    function __construct($Id){
        if($Id != ""){

            $conn=DB::getConnection();
            $sql="select * from address where Id=".$Id;
            $addressInfoDS = $conn->query($sql);
            $addressInfoobj= $addressInfoDS->fetch_assoc();
            $this->Id=$addressInfoobj["Id"];
            $this->parentid=$addressInfoobj["parentid"];
            $this->name=$addressInfoobj["name"];

        }
    }

    public function getaddressid(){
        return isset($this->Id) ? $this->Id : null;
    }

    public function setcityname($name){
         $this->name=$name;
    }

    public function getcityname(){
        return isset($this->name)? $this->name : null;
    }

    public function setparentid($parentid){
        $this->parentid=$parentid;
    }

    public function getparentid(){
        return isset($this->parentid)? $this->parentid : null;
    }
 

}

?>