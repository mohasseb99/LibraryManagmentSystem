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
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html">Library<span>Pro</span></a> <small>put your slogan here</small></h1>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
        <?php

include_once "../models/helper.php";
$conn = DB::getConnection();
session_start();
$userTypeId = 4;
if(isset($_SESSION["userTypeId"])){
 
  $userTypeId = $_SESSION["userTypeId"];
}
$sql = "SELECT * FROM usertypepages WHERE userTypeId = $userTypeId ORDER BY userTypeId";
$dataset = $conn->query($sql);
while($row = $dataset->fetch_assoc()){
    $sql = "SELECT * FROM pages WHERE Id =" . $row['pageid'];
    $dataset1 = $conn->query($sql);
    $row1 = $dataset1->fetch_assoc();
    if($row1["PhysicalAddress"] == "showstaticcontent.php"){
        ?>
        <li><a href="<?php echo $row1['PhysicalAddress']."?pageid=".$row1["Id"];?>"><?php echo $row1["FriendlyName"];?></a></li>
        <?php
    } else {
        ?>
        <li><a href="<?php echo $row1['PhysicalAddress'];?>"><?php echo $row1["FriendlyName"];?></a></li>
        <?php
    }
}
?>

<br>
<br>
<br>



