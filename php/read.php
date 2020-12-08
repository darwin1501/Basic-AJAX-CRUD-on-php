<?php

header('Access-Control-Allow-Origin: http://127.0.0.1:8080/ajax/crud/php/read.php');

include '../db/db.php';


// SELECT * FROM `students` 
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo $row["firstname"]." ";

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
		<button class="button" onclick="edit()" value = <?php echo $row['id'];?> id = <?php echo $row['id'];?>>
		edit
		</button>
	</td>
</tr>

<?php

  }
} else {
  // echo "0 results";
}

$conn->close();