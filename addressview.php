<?php
include_once "db.php"; 
include_once "helper.php"; 
include_once "addressController.php"; 
class Addressview{
    function PrintUserAddress($usercityaddid){

        $addressContobj= new addressController();
        $array=$addressContobj->ComputeFullAddress($usercityaddid);
        ?>
        <table border=2, cellpadding=7m cellspacing =9, width=800 >
        <tr>
            <th width = 200>Address</th>
            <td><?php echo $array[0] . " " . $array[1] . " " . $array[2]; ?></td> 
        </tr> 
    </table>


        <?php
    }
}
?>