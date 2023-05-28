<?php
include_once "helper.php";
class bookcategory{

private $id;
private $name;
function __construct($id)
{
    if($id!="")
    {
     $conn=  $conn= DB::getConnection();
     $sql = "SELECT * FROM bookcategory WHERE id =".$id;
     $booksInfoDS = $conn->query($sql);
     $booksInfoObj = $booksInfoDS->fetch_assoc();
     $this->id=$booksInfoObj ["id"];
     $this->name=$booksInfoObj ["name"];



    }
}
public function setId($id) {
    $this->id = $id;
}

public function getId() {
    return $this->id;
}

public function setName($name) {
    $this->name = $name;
}

public function getName() {
    return $this->name;
}

}
//$obj= new bookcategory(2);
//echo $obj->getName();

















?>