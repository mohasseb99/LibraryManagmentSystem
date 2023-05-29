<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>LibraryPro</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
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
      
            <?php 
                include_once "db.php";
                session_start();
                function getSubmenusByUserType($parentId, $userTypeId, $conn) {
                    $sql = "SELECT pages.* FROM pages
                        INNER JOIN usertypepages ON pages.Id = usertypepages.pageid
                        WHERE pages.parentId = $parentId AND usertypepages.usertypeid = $userTypeId order by orderby";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        if($parentId != 14){
                            echo '<ul class="dropdown">';
                        }
                        else{echo '<ul>';}
                        while ($row = $result->fetch_assoc()) {
                            if($row["PhysicalAddress"] == "showstaticcontent.php"){
                                ?>
                                <li><a href="<?php echo $row['PhysicalAddress']."?pageid=".$row["Id"];?>"><?php echo $row["FriendlyName"];?></a>
                                <?php
                                getSubmenusByUserType($row['Id'], $userTypeId, $conn);
                                echo '</li>';
                            }
                            else{
                                ?>
                                <li><a href="<?php echo $row['PhysicalAddress'];?>"><?php echo $row["FriendlyName"];?></a>
                                <?php
                                getSubmenusByUserType($row['Id'], $userTypeId, $conn);
                                echo '</li>';
                            }
                        }
                        echo '</ul>';
                    }
                }
                $userTypeId = 4;
                if(isset($_SESSION["userTypeId"])){
                    $userTypeId = $_SESSION["userTypeId"];
                }
                getSubmenusByUserType(14, $userTypeId, $conn);
                /*
                $sql = "select * from usertypepages where userTypeId = $userTypeId order by orderby";
                $dataset = $conn->query($sql);
                while($row = $dataset->fetch_assoc()){
                    $sql = "select * from pages where Id =". $row['pageid'];
                    $dataset1 = $conn->query($sql);
                    $row1 = $dataset1->fetch_assoc();
                    if($row1["PhysicalAddress"] == "showstaticcontent.php"){
                        ?>
                        <li><a href="<?php echo $row1['PhysicalAddress']."?pageid=".$row1["Id"];?>"><?php echo $row1["FriendlyName"];?></a></li>
                        <?php



                    }
                    else{
                        ?>
                        <li><a href="<?php echo $row1['PhysicalAddress'];?>"><?php echo $row1["FriendlyName"];?></a></li>
                        <?php
                    }
                }*/
            ?>
      </div>
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
          </span>
          <input name="button_search" src="images/search_btn.gif" class="button_search" type="image" />
        </form>
      </div>
      <div class="clr"></div>
    </div>
  </div>

