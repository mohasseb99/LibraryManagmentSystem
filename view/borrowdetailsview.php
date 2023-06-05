<?php
	include_once __DIR__ . "/../helper.php";
	include_once __DIR__ . "/../models/bookfile.php";

	class borrowDetailsView{
		public function showBorrowDetails($borrowDetails){
			?>		
			<table border = 1 width = "100%">
			<tr> <td> Book Name </td> <td> Category Name </td> <td> book Image </td>
			<?php 
			for($i=0; $i < count($borrowDetails); $i++){
				?>	
				<tr><td width = "30%"><?php echo $borrowDetails[$i]->getBookIdObj()->getBookName(); ?> </td> <td width = "30%"> <?php echo $borrowDetails[$i]->getBookIdObj()->getCategoryIdObj()->getName(); ?></td>
				<?php
				$bookFile = bookfile::getObjectByBookId($borrowDetails[$i]->getBookIdObj()->getID());
				?><td width = "30%"> <?php
					echo "<img src=" . $bookFile->getFilePath() . ">" . "<br>";
				?> </td></tr> <?php
			}
			?> </table>
			<?php
		}
	}

?>