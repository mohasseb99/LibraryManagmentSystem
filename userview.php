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
            <th >Date of Birth</th>
            <td><?php echo $objUser->dateOfBirth; ?></td>
            </tr> 

        </table>

        <?php
    }
}

?>