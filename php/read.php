<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/read.php');

include '../db/db.php';


//OOP
class Read{
	public function distributeToTables(){
		//run database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();
		
		// SELECT * FROM `students` 
		$sql = "SELECT * FROM students ORDER BY `id` DESC";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
		    // echo $row["firstname"]." ";
		?>
		<?php?>
		<tr>
			<td data-th="ID">
				<?php 
					echo $row['id'];
				?>
			</td>
			<td data-th="Firstname">
				<?php 
					echo $row['firstname'];
				?>
			</td>
			<td data-th="Middlename">
				<?php 
					echo $row['middlename'];
				?>
			</td>
			<td data-th="Lastname">
				<?php 
					echo $row['lastname'];
				?>
			</td>
			<td data-th="Email">
				<?php 
					echo $row['email'];
				?>
			</td>
			<td data-th="Options">
				<button class="btn-edit" onclick="edit()" value = <?php echo $row['id'];?>>
				edit
				</button>
				<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
				delete
				</button>
			</td>
			<!-- <td>
				<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
				delete
				</button>
			</td> -->
		</tr>
		<?php
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();
	}
}

$read = new Read();
$read->distributeToTables();
