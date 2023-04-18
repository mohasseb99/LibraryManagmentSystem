<?php

   /****************************** Description of the code ************************************************/
   /*Target of this code is to insert new row inside the user table in the database
     there is a form that allows the user to choose the type of user using the combobox 
	 and the text field for other information.
	when submit button is pressed a new row will be inserted in the table */
    /***************************************************************************************************** */

   //instead of writing $conn= new mysqli("localhost", "root","", "library_mysql"); each time we make include 
   //mysqli : it is an object that, that object is embedded inside the php language, that object open a new connection on the database 
   //in order to retrieve information on the database 
   // the connection allows us to execute, insert or update   
   include_once ("db.php");

   	//write the query 
	//Note: till now we do not have anything that can relate that connection with that query -->"SELECT * FROM usertype"
	//so till now the query is not executed      
   $sqlstmtUserTypes = "SELECT * FROM usertype";

	//$conn->query: here occurs the execution of that query
	//$conn->query: returns a table
	//the table that will be returned is called the dataset   
   $resultDataSet = $conn->query($sqlstmtUserTypes);


   /*if we send the data with the Get method we can use $_GET[] 
     if we send the data with the host method we can use $_HOST[] 
	 if we do not know the data is sent by get or host we use $_REQUEST[]*/
	 /**check whether the $_REQUEST["userId"] is filled with id or not because if it is not filled with id there will be error */
	 /**isset checks if the variable foundor not*/
	if(isset($_REQUEST["userId"])){
		 /**here the user will make an update because there is an id  */
		 echo "you are making an update";

		$userId = $_REQUEST["userId"];
		$sql = "SELECT * from user where id = $userId";
		$userInfoDS = $conn->query($sql);
		$userInfoobj = $userInfoDS->fetch_assoc();
	}
    else{

		echo "you are making an add";
    }

?>


<!--method="POST" :means that it goes to the other page with binary format-->
<!--action: when the form is filled the content will go to which page -->
<!--the value of the type attribute determnies what kind of the input they will be creating -->
<!--name attribute: form control values are passed to the server as name -->
<!--input element is used to create several different form controls-->
<form action=addUserdb.php method="POST">

    <!--content of userInfoobj[] will appear in the text field-->
	FullName <input type=text name="fullName" value="<?php echo @$userInfoobj["fullName"] ?>"> <br>
	username <input type=text name="userName" value="<?php echo @$userInfoobj["userName"] ?>"> <br>
	Date of Birth <input type=text name="dateOfBirth" value="<?php echo @$userInfoobj["dateOfBirth"] ?>"> <br>
	Password <input type=password name="password" value="<?php echo @$userInfoobj["password"] ?>"> <br>
    CityNum <input type= number name="cityname" value="<?php echo @$userInfoobj["cityid"] ?>"> <br>
	<!--there is a combo box that will allow the user to choose the type -->
	<select name="userTypeId">
		<?php
			while ($row = $resultDataSet->fetch_assoc())
			{
				if(isset($userInfoobj)){
					if($row["id"] == $userInfoobj["userTypeId"]){
						/**we want certain user type to be selected  */
						echo "<option selected value=" .$row["id"] . ">" . $row["name"] . "</option>";
					}
				}
				else{
					echo "<option value=" . $row["id"] .  ">" . $row["name"] . "</option>";
				}
			}
		?>
	</select> <br>
	<!--if I neeed to pass a variable from one page to another without allowing the user to see it-->
	<!--@ sign will remove the warning-->
	<input type="hidden" name="userId" value="<?php echo @$userId; ?>">
	
	<!--when the button submit is pressed we go to a page named addUserdb -->
	<input type="submit">
</form>