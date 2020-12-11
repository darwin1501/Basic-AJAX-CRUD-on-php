<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/search.php');

include '../db/db.php';

$firstname = $_REQUEST["fname"];
// $firstname = "Per";

// $query1= mysqli_query($con,"SELECT * FROM std_prf WHERE full_name LIKE '%".$_POST["search"]."%' ");
$sql = "SELECT * FROM `students` WHERE `firstname` LIKE '%".$firstname."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo $row["firstname"];

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

