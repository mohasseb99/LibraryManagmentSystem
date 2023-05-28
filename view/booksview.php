<?php
class booksview{
 
    function showbooks($Objbooks)
    {
        ?>
        <table border =1>
            <tr bgcolor=yellow>
                <td>
                    NAME OF BOOK 
                </td>
                <td>
                    <?php
                    echo $Objbooks->getBookName();
                    ?>
                </td>
            </tr>

            <tr bgcolor=yellow>
                <td>
                    fees
                </td>
                <td>
                    <?php
                    echo $Objbooks->getFees();
                    ?>
                </td>
            </tr>

            <tr bgcolor=yellow>
                <td>
                    available ? 
                </td>
                <td>
                    <?php
                    echo $Objbooks->getAvailable();
                    ?>
                </td>
            </tr>

            <tr bgcolor=yellow>
                <td>
                    description
                </td>
                <td>
                    <?php
                    echo $Objbooks->getDescriptionBook();
                    ?>
                </td>
            </tr>

            
        </table>
        <?php   








    }






}





?>