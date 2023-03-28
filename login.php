<font color = red>
<?php
if(isset($_REQUEST["msg"])){
	echo $_REQUEST["msg"] . "<br>";
}
?>
</font>

<form action=dologin.php  method=POST>
	username <input type=text name="userName"> <br>
	password <input type=password name="password"> <br>
	<input type=submit>
</form>