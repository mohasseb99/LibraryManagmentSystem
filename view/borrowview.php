<?php
	include_once __DIR__ . "/../Encrypt.php";
	class borrowView{
		function showBorrowInfo($objBorrows){
			$length = count($objBorrows); 
			if($length > 0){
				?>
				<table border = 1 width = "100%">
				<tr>
					<td width = "50%"> Reader Full Name </td> 
					<td width = "50%"> <?php echo $objBorrows[0]->getReaderIdObj()->getFullName(); ?> </td>
				</tr>
				<?php
				$path = __DIR__ . "/";
				for($i = 0; $i < $length; $i++) {
					$borrowIdEnc = Encrypt::Encrypt($objBorrows[$i]->getId(), 3);
					$command = Encrypt::Encrypt("delete", 3);
					echo "<tr><td>borrow date </td><td><a href=borrowDetails.php?bid=" . $borrowIdEnc . ">" . $objBorrows[$i]->getBorrowDate() . "</a></td>";
					echo "<td><a href=controllers/borrowcontroller.php?id=" . $borrowIdEnc . "&command=" . $command . "> Delete </a> </td>";
					echo "</tr>";
				}
				?>
				</table>
				<?php
			}
			else{
				echo "You have not borrowed books before";
			}
		}
	}



?>