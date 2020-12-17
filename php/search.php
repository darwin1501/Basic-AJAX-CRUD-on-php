<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/search.php');

include '../db/db.php';




//OOP
class Search{
	public function searchRecord(){
		$auth = new Auth();
		$conn = $auth->checkAuth();
		$firstname = $_REQUEST["fname"];

		$sql = "SELECT * FROM `students` WHERE `firstname` LIKE '%".$firstname."%' ORDER BY `id` DESC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
  		// output data of each row
  		while($row = $result->fetch_assoc()) {
		?>
		<?php?>
		 <tr>
			<td>
				<?php 
					echo $row['id'];
				?>
			</td>
			<td>
				<?php 
					echo $row['firstname'];
				?>
			</td>
			<td>
				<button class="btn-edit" onclick="edit()" value = <?php echo $row['id'];?>>
				edit
				</button>
			</td>
			<td>
				<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
				delete
				</button>
			</td>
		</tr> 
		<?php
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();
	}
}

$search = new Search();
$search->searchRecord();

