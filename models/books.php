<?php
include_once "bookcategory.php";
include_once "helper.php";
class books {
    private $id;
    private $bookName;
    private $categoryIdObj;
    private $fees;
    private $available;
    private $descriptionbook;
 
 function __construct($id)
    {
       if($id!="")
       {
        $conn= DB::getConnection();
        $sql = "SELECT * FROM books WHERE id =".$id;
        $booksInfoDS = $conn->query($sql);
        $booksInfoObj = $booksInfoDS->fetch_assoc();
        $this->id=$booksInfoObj ["id"];
        $this->bookName=$booksInfoObj ["bookName"];
        $this->fees=$booksInfoObj ["fees"];
        $this->available=$booksInfoObj ["available"];
        $this->descriptionbook=$booksInfoObj ["descriptionbook"];
        $this->categoryIdObj=new bookcategory($booksInfoObj["categoryId"]);
        
    }
    }
    public function setID($id) {
        $this->id= $id;
    }

    public function getID() {
        return $this->id;
    }

    public function setBookName($bookName) {
        $this->bookName = $bookName;
    }

    public function getBookName() {
        return $this->bookName;
    }

    public function setCategoryIdObj($categoryIdObj) {
        $this->categoryIdObj = $categoryIdObj;
    }

    public function getCategoryIdObj() {
        return $this->categoryIdObj;
    }

    public function setFees($fees) {
        $this->fees = $fees;
    }

    public function getFees() {
        return $this->fees;
    }

    public function setAvailable($available) {
        $this->available = $available;
    }

    public function getAvailable() {
        return $this->available;
    }

    public function setDescriptionBook($descriptionbook) {
        $this->descriptionbook = $descriptionbook;
    }

    public function getDescriptionBook() {
        return $this->descriptionbook;
    }
}

//$obj= new books(3);
//echo $obj->getBookName()."-".$obj->getCategoryIdObj()->getName();



?>