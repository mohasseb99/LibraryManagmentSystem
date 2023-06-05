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
        <h1><a href="index.php">Library<span>Pro</span></a> <small>put your slogan here</small></h1>
      </div>
      <div class="clr"></div>
      <div class="menu_nav">
      
            <?php 
                include_once "helper.php";
                session_start();
                include_once "models/usertypepages.php";
                include_once "Encrypt.php";
                function getSubmenusByUserType($parentId, $userTypeId, $conn) {
                    $pages = usertypepages::getPagesUserTypeParentId($parentId, $userTypeId);
                    $length = count($pages);
                    if ($length > 0) {
                        if($parentId != 14){
                            echo '<ul class="dropdown">';
                        }
                        else{echo '<ul>';}
                        for($i = 0; $i < $length; $i++) {
                            if($pages[$i]->getPhysicalAddress() == "showstaticcontent.php"){
                                ?>
                                <?php
                                $pageIdenc = Encrypt::Encrypt($pages[$i]->getId(), 3);

                                ?>
                                <li><a href="<?php echo $pages[$i]->getPhysicalAddress() ."?pageid=". $pageIdenc;?>"><?php echo $pages[$i]->getFriendlyName(); ?></a>
                                <?php
                                getSubmenusByUserType($pages[$i]->getId(), $userTypeId, $conn);
                                echo '</li>';
                            }
                            else{
                                ?>
                                <li><a href="<?php echo $pages[$i]->getPhysicalAddress();?>"><?php echo $pages[$i]->getFriendlyName();?></a>
                                <?php
                                getSubmenusByUserType($pages[$i]->getId(), $userTypeId, $conn);
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
                $conn = DB::getConnection();
                getSubmenusByUserType(14, $userTypeId, $conn);
            ?>
      </div>
      <div class="clr"></div>
    </div>
  </div>

