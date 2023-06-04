<?php
include_once "db.php";
include_once "users.php";
class userview{
    function showuserInfoo($objUser){

        /*$userviewobj = new user($objUser);
        $objUsername  = $userviewobj->getusername();
        $objfullname  = $userviewobj->getfullName();
        $dateofbirth  = $userviewobj->getdateofbirth();*/

        $objUsername  = $objUser->getusername();
        $objfullname  = $objUser->getfullName();
        $dateofbirth  = $objUser->getdateofbirth();
        
        ?>
        <table border=2, cellpadding=7m cellspacing =9, width=800 >
            <tr>
            <th width = 200>full Name</th>
            <td><?php echo $objfullname; ?></td> 
            </tr> 

            <tr>
            <th >User Name</th>
            <td><?php echo $objUsername; ?></td>
            </tr> 



            <tr>
            <th >Date of Birth</th>
            <td><?php echo $dateofbirth; ?></td>
            </tr> 

        </table>

        <?php
    }
}

?>