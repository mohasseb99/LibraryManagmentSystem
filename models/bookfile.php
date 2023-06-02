<?php

include_once "books.php";
include_once "helper.php";

class bookfile {
    private $id;
    private $bookIdObj;
    private $filePath;
    
    public function __construct($id)
{
    $conn = DB::getConnection();
    $sql = "SELECT * FROM bookfile WHERE id =" . $id;
    $booksInfoDS = $conn->query($sql);
    $booksInfoObj = $booksInfoDS->fetch_assoc();
            $this->id = $booksInfoObj["id"];
            $this->filePath = $booksInfoObj["filePath"];
            $this->bookIdObj = new books($booksInfoObj["bookId"]);
        }

        public function setID($id) {
            $this->id = $id;
        }
    
        public function getID() {
            return $this->id;
        }
    
        public function setBookIdObj($bookIdObj) {
            $this->bookIdObj = $bookIdObj;
        }
    
        public function getBookIdObj() {
            return $this->bookIdObj;
        }
    
        public function setFilePath($filePath) {
            $this->filePath = $filePath;
        }
    
        public function getFilePath() {
            return $this->filePath;
        }
           







}







///






?>