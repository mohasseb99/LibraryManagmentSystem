 <?php
session_start();

/**if the session of the user is opened  */
if(isset($_SESSION["id"])){

	 //instead of writing $conn= new mysqli("localhost", "root","", "library_mysql"); each time we make include
	 //mysqli : it is an object that, that object is embedded inside the php language, that object open a new connection on the database 
    //in order to retrieve information on the database 
    // the connection allows us to execute, insert or update   
	include_once "db.php";

	//write the query 
	//Note: till now we do not have anything that can relate that connection with that query -->$sqlstmtUserTypes
	//so till now the query is not executed      
	$sqlstmtUserTypes = "SELECT * FROM usertype"; 
	
	//$conn->query: here occurs the execution of that query
	//$conn->query: returns a table
	//the table that will be returned is called the dataset   
	$resultDataSet = $conn->query($sqlstmtUserTypes);


	//fetch_assoc(): that function retrieve one row from the data set till the end 
	//fetch_assoc(): returns specific row then move the cursor to the next row 
	//the data set will be many rows one after the other,     
	while ($row = $resultDataSet->fetch_assoc())
	{
		//Display the content of each row in that case it is the id num and the name of the user type
		//<hr> means horizontal line and . is written for concatenation 
		//<a href= link> for making a hyper link, it is provided between double quotes because we write html language between double quotes
		//when we click on it we need to move to list all users page 
		//userTypeId=" :means that we send the id to the page listAllUsers if the user clicks on a certain hyperlink
		echo "<a href=listAllUsers.php?userTypeId=" . $row["id"] .  ">" . $row["name"] . "</a>  <hr>";
	}
}
else{
	/**if the session is closed or he did not login the user will be directed to login page  */
	header('location:login.php?msg= Not Authorized <br> Please log in first');
}
?>

