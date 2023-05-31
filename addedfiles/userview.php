<?php
include_once "db.php";

class userview{
    function showuserInfo($objUser){
        ?>
        <table border=2, cellpadding=7m cellspacing =9, width=800 >
            <tr>
            <th width = 200>Name</th>
            <td><?php echo $objUser->fullName; ?></td> 
            </tr> 

            <tr>
            <th >User Name</th>
            <td><?php echo $objUser->userName; ?></td>
            </tr> 

            <tr>
            <th >User type</th>
            <?php 
                  //$objUser->usertype->name;

                 ?>
            <td></td>
            </tr> 


            <tr>
            <th >Date of Birth</th>
            <td><?php echo $objUser->dateOfBirth; ?></td>
            </tr> 

            <tr>
            <th >Address</th>
            <td><?php/* $sql= "SELECT * FROM user WHERE id = $objUser->id";

                  $userInfoDS = $conn->query($sql);
                  $userInfoobj = $userInfoDS->fetch_assoc();

                   $cityIdVar=$userInfoobj["cityid"];

                   while($cityIdVar != 0){
                       $sql2="SELECT * FROM address WHERE Id=$cityIdVar";
                       $addressdataset= $conn->query($sql2);
                       $firstrow = $addressdataset->fetch_assoc();
                        echo "$firstrow[name]  ";
                       $cityIdVar=$firstrow["parentid"];
                   }*/?> </td>
            </tr> 


        </table>

        <?php
    }
}

?>