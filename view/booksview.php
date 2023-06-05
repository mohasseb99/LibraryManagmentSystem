<?php
include_once "../models/helper.php";

class booksview {


/**********  show of design ADD BOOKS *********/

    public function addbook() {
        ?>    
    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Match header color */
        }

        .form-container p {
            margin-bottom: 10px;
        }

        .form-container label {
            display: block;
            font-weight: bold;
            color: #666; /* Match header color */
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Add transition effect */
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Book</h2>
        <form action="bookscontrol.php" method="post">
            <input type="hidden" name="command" value="addbook">
            <p>
                <label for="bookName">Book Name:</label>
                <input type="text" name="bookName" id="bookName">
            </p>
            <p>
                <label for="categoryId">Category ID:</label>
                <input type="text" name="categoryId" id="categoryId">
            </p>
            <p>
                <label for="quantity">Quantity:</label>
                <input type="text" name="quantity" id="quantity">
            </p>
            <p>
                <label for="fees">Fees:</label>
                <input type="text" name="fees" id="fees">
            </p>
            <p>
                <label for="descriptionbook">Description:</label>
                <input type="text" name="descriptionbook" id="descriptionbook">
            </p>
            <p>
                <input type="submit" value="Add Book">
            </p>
        </form>
    </div>
</body>
</html>

        <?php
    }

 /**********  retrive the items  books *************/

    
        

        public function showBooks($resultDataSet) {
            while ($row = $resultDataSet->fetch_assoc()) {
                echo "bookName: " . $row["bookName"] . "<br>";
                echo "price: " . $row["fees"] . "<br>";
                echo "quantity: " . $row["quantity"] . "<br>";
                echo "description: " . $row["descriptionbook"] . "<br>";
                
                echo "<hr>";
                echo "<a href='addToCart.php?bookId=" . $row["id"] . "'>Add to Cart</a>";
                echo "<hr>";
            }
        }
         
        
   
/*******************  show AJAX SEARCH *****8*********/


        public function showSearchForm() {
            ?>
            <form action="listAllBooks.php" method="get">
                <input type="text" name="query" placeholder="Search by BOOK name..." onkeyup="searchbook(this.value)"> <br>
                <div id="myresult"></div> 
            </form>
    
            <script>
                function searchbook(str) {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("myresult").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "listAllBooks.php?query=" + str, true);
                    xmlhttp.send();
                }
            </script>
            <?php
        }



    /******view listallbooks****/
        public function LISTALLBOOKS()
        {
            ?>
            <h2>LIST ALL BOOKS</h2>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <title>LibraryPro</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <link href="../view/style.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="js/cufon-yui.js"></script>
            <script type="text/javascript" src="js/arial.js"></script>
            <script type="text/javascript" src="js/cuf_run.js"></script>
            </head>
            <body>
            <?php

        }


        /******view listallcategory****/
        public function LISTALlCATEGORY()
        
        {
          ?>
          <h2>LIST ALL CATEGORY</h2>
          <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
          <title>LibraryPro</title>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <link href="../view/style.css" rel="stylesheet" type="text/css" />
          <script type="text/javascript" src="js/cufon-yui.js"></script>
          <script type="text/javascript" src="js/arial.js"></script>
          <script type="text/javascript" src="js/cuf_run.js"></script>
          </head>
          <body>
            <?php





        }
        /*****EVA DESIGN PATTERN TO SHOW ITEMS OF BOOK AND ADD THEM FROM DATABASE DIRECT *****/
        
        
        }
    
        

        
            

           
?>
