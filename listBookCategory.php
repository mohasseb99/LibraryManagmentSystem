
<?php
include_once "header.php";
include_once "../db.php";

?>


<h2>CATEGORY Book</h2>
<?php


$sqlstmtUserTypes = "SELECT * FROM bookcategory";
$resultDataSet = $conn->query($sqlstmtUserTypes);
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : null;
$userId=0;


if(isset($_SESSION["userTypeId"])){
  $userId=$_SESSION["id"];
}

//echo $resultDataSet->num_rows;
// it returs rows as array
while ($row = $resultDataSet->fetch_assoc())
{
	$sql = "SELECT count(*) FROM books WHERE categoryId=" . $row["id"];
	$resultDataSet1 = $conn->query($sql);
	$row1 = mysqli_fetch_array($resultDataSet1);
	echo "<a href=listAllBooks.php?categoryId=" . $row["id"] . "&userId=". $userId .">"   . $row["name"] . "(". $row1[0] .")</a>  <hr>";
	

}

?>

<form>
  <input type="text" name="query" placeholder="Search by BOOK name..." onkeyup="searchbook(this.value)"> <br>
  <div id="myresult"></div> 
  
</form>
<script>
    function searchbook(str)//ajax
    {
        //alert(str); //  to check
        //document.getElementById("myresult").innerHTML=str;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
             if (this.readyState==4 && this.status==200)
             {
              document.getElementById("myresult").innerHTML=this.responseText;

             }




        };
        xmlhttp.open("GET","listAllBooks.php?query="+str,true);
        xmlhttp.send();
    }
</script>


<?php



include_once "footer.php";
?>

