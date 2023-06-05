<?php
include_once "bookcategory.php";
include_once "helper.php";

class books {
    private $id;
    private $bookName;
    private $categoryIdObj;
    private $fees;
    private $quantity;
    private $available;
    private $descriptionbook;

    public function __construct($id=null) {
        if ($id !== null) {
            $conn = DB::getConnection();
            $sql = "SELECT * FROM books WHERE id =" . $id;
            $booksInfoDS = $conn->query($sql);
            $booksInfoObj = $booksInfoDS->fetch_assoc();
            $this->id = $booksInfoObj["id"];
            $this->bookName = $booksInfoObj["bookName"];
            $this->fees = $booksInfoObj["fees"];
            $this->quantity = $booksInfoObj["quantity"];
            $this->available = $booksInfoObj["available"];
            $this->descriptionbook = $booksInfoObj["descriptionbook"];
            $this->categoryIdObj = new bookcategory($booksInfoObj["categoryId"]);
        }
    }

    public function addbook() {
        $conn = DB::getConnection();

        if (!empty($this->id)) {
            $bookId = $this->id;
            $sql = "UPDATE books SET bookName = '$this->bookName', categoryId = '$this->categoryIdObj', quantity = '$this->quantity', fees = '$this->fees', descriptionbook = '$this->descriptionbook', available = '$this->quantity' WHERE id = $bookId";
        } else {
            $sql = "INSERT INTO books (bookName, categoryId, quantity, fees, descriptionbook, available) VALUES ('$this->bookName', '$this->categoryIdObj', '$this->quantity', '$this->fees', '$this->descriptionbook', '$this->quantity')";
        }

        if ($conn->query($sql)) {
            header('Location: listAllBooks.php');
            exit();
        }
    }

    public function getBookCategories() {
        $conn = DB::getConnection();
        $sqlstmtUserTypes = "SELECT * FROM bookcategory";
        $resultDataSet = $conn->query($sqlstmtUserTypes);
        return $resultDataSet;
    }

     

     /*****EVA DESIGN PATTERN TO SHOW ITEMS OF BOOK AND ADD THEM FROM DATABASE DIRECT *****/
    public function getBooksByCategoryId($categoryId,$userId) {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM books WHERE categoryId = $categoryId";
        $resultDataSet = $conn->query($sql);

            while ($row = $resultDataSet->fetch_assoc()) {
                echo "bookName: " . $row["bookName"] . "<br>";
                echo "price: " . $row["fees"] . "<br>";
                echo "quantity: " . $row["quantity"] . "<br>";
                echo "description: " . $row["descriptionbook"] . "<br>";
                $sql1 = "SELECT * FROM bookcategory_options,options WHERE bookcategoryid =" . $categoryId . " and options.id=bookcategory_options.optionsid";
                $dataset2 = $conn->query($sql1);
                while($row1 = $dataset2->fetch_assoc())
                {
                    $sql2 = "SELECT * FROM bookcategoryiotions_value WHERE BCOid = ".$row1["id"] . " and Bid = " . $row["id"];
                    $dataset3 = $conn->query($sql2);
                    $row2 = $dataset3->fetch_assoc();
                    echo $row1["AttribName"].": " . $row2["value"]." <br>";
                
                    }
                    echo "<a href=addToBorrow.php?bookId=" . $row["id"] . "&userId=$userId> Add to Borrowed Books </a>";
                    echo "<hr>";
                       
            
        
        }   

        return $resultDataSet;
    }

   

    

    public function showBookCategories($resultDataSet, $userId) {
        $conn = DB::getConnection();
        while ($row = $resultDataSet->fetch_assoc()) {
            $sql = "SELECT count(*) FROM books WHERE categoryId=" . $row["id"];
            $resultDataSet1 = $conn->query($sql);
            $row1 = mysqli_fetch_array($resultDataSet1);
            echo "<a href='listAllBooks.php?categoryId=" . $row["id"] . "&userId=" . $userId . "'>" . $row["name"] . "(" . $row1[0] . ")</a>  <hr>";
        }
    }

    

    public function searchBooks($searchTerm) {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM books WHERE bookName LIKE '%$searchTerm%'";
        $result = $conn->query($sql);
        return $result;
    }
    public function returnBook(){
        $ava = $this->getAvailable() + 1;
		$sql = "UPDATE books SET available = $ava WHERE id = $this->id";
		$conn= DB::getConnection();
        $conn->query($sql);        
    }

    public function canBorrow(){
        $ava = $this->getAvailable();
        if($ava > 0){
            $ava -= 1;
            $this->setAvailable($ava);
            $bookId = $this->id;
            $sql = "UPDATE books SET available = $ava WHERE id = $bookId";
			$conn= DB::getConnection();	
            $conn->query($sql);
            return true;
        }
        else{
            return false;
        }
    }




    

  

    public function setID($id) {
        $this->id = $id;
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

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getQuantity() {
        return $this->quantity;
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