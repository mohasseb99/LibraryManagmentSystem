<?php
include_once "header.php";
include_once "../db.php";



if(isset($_REQUEST["books"])){
	$bookId = $_REQUEST["bookId"];
	$sql = "SELECT * from books where id = $bookId";
	$userInfoDS = $conn->query($sql);
	$userInfoobj = $userInfoDS->fetch_assoc();
}






?>

<h2>Add Book</h2>
                        <form action="addbookdb.php" method="POST" enctype="multipart/form-data">
                            <p>
                                <label for="bookName">Book Name:</label>
                                <input type="text" name="bookName" id="bookName" value="<?php echo isset($userInfoobj['bookName']) ? $userInfoobj['bookName'] : ''; ?>" />
                            </p>
                            <p>
                                <label for="categoryId">Category ID:</label>
                                <input type="text" name="categoryId" id="categoryId" value="<?php echo isset($userInfoobj['categoryId']) ? $userInfoobj['categoryId'] : ''; ?>" />
                            </p>
                            <p>
                                <label for="quantity">Quantity:</label>
                                <input type="text" name="quantity" id="quantity" value="<?php echo isset($userInfoobj['quantity']) ? $userInfoobj['quantity'] : ''; ?>" />
                            </p>
                            <p>
                                <label for="fees">Fees:</label>
                                <input type="text" name="fees" id="fees" value="<?php echo isset($userInfoobj['fees']) ? $userInfoobj['fees'] : ''; ?>" />
                            </p>
                            <p>
                                <label for="descriptionbook">Description:</label>
                                <input type="text" name="descriptionbook" id="descriptionbook" value="<?php echo isset($userInfoobj['descriptionbook']) ? $userInfoobj['descriptionbook'] : ''; ?>" />
                            </p>
                            
                            <p>
                                <input type="submit" value="Submit" />
                            </p>
                        </form>




























<?php
include_once "footer.php";
?>