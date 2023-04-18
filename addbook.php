<?php

include_once "db.php";




if(isset($_REQUEST["books"])){
	$bookId = $_REQUEST["bookId"];
	$sql = "SELECT * from books where id = $bookId";
	$userInfoDS = $conn->query($sql);
	$userInfoobj = $userInfoDS->fetch_assoc();
}
else{

}






   

?>




<form action=addbookdb.php method="POST" enctype="multipart/form-data">
	bookname <input type=text name="bookName" value="<?php echo @$userInfoobj["bookName"] ?>"> <br>
	categoryid <input type=text name="categoryId" value="<?php echo @$userInfoobj["categoryId"] ?>"> <br>
	quantity <input type=text name="quantity" value="<?php echo @$userInfoobj["quantity"] ?>"> <br>
	fees <input type=text name="fees" value="<?php echo @$userInfoobj["fees"] ?>"> <br>
	description <input type=text name="descriptionbook" value="<?php echo @$userInfoobj["descriptionbook"] ?>"> <br>
	imagepath<input type=file name="upload"value="<?php echo @$userInfoobj["filePath"] ?>"> <br>
	
     
	
	 
	<input type="hidden" name="bookId" value="<?php echo @$bookId; ?>">
	
	<input type="submit">
</form>



