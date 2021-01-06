<?php

include '../db/db.php';

class Operations{
    public function create(){
        //database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$id = NULL;
		$firstname = trim($_REQUEST["firstname"]);
		$middlename = trim($_REQUEST["middlename"]);
		$lastname = trim($_REQUEST["lastname"]);
		$email = trim($_REQUEST["email"]);

		$sql = $conn->prepare("INSERT INTO students (id, firstname, middlename, lastname, email) VALUES (:id, :firstname, :middlename, :lastname, :email)");
		$sql->bindParam(':id', $id);
		$sql->bindParam(':firstname', $firstname);
		$sql->bindParam(':middlename', $middlename);
		$sql->bindParam(':lastname', $lastname);
		$sql->bindParam(':email', $email);

		$sql->execute();

		//close connection
		$conn = NULL;
		$sql = NULL;
    }
    public function read(){
		//run database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$sql = $conn->prepare("SELECT * FROM students ORDER BY `id` DESC");

		if ($sql->execute()) {
		  // output data of each row
		  while($row = $sql->fetch()) {
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
				<!-- <button class="btn-edit" onclick="edit()" value = <?php echo $row['id'];?>>
				edit
				</button>
				<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
				delete
				</button> -->
				<div class="dropdown">
  					<div class="dropbtn"></div>
					<div class="dropdown-content">
						<button class="btn-edit" onclick="edit()" value = <?php echo $row['id'];?>>
							edit
						</button>
						<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
							delete
						</button>
					</div>
				</div>
			</td>
		</tr>
		<?php
		  }
		} else {
		  echo "0 results";
		}
		$conn = NULL;
		$sql = NULL;
    }
    public function edit(){
        //database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$id = $_REQUEST["id"];
		$resultArray = [];

		$sql = $conn->prepare("SELECT * FROM `students` WHERE `id` =".$id);

		if ($sql->execute()) {
			while ($row = $sql->fetch()) {
				//push objects with key into array
				$resultArray['id'] = $row['id'];
				$resultArray['firstname'] = $row['firstname'];
				$resultArray['middlename'] = $row['middlename'];
				$resultArray['lastname'] = $row['lastname'];
				$resultArray['email'] = $row['email'];
			}
		}else{
			// echo "no results";
		}
		//format array into JSON
		echo json_encode($resultArray, JSON_PRETTY_PRINT);
		//close connection
		$conn = NULL;
		$sql = NULL;
    }
    public function update(){
        //database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();
		
		$id = $_REQUEST["id"];
		$firstname = trim($_REQUEST["firstname"]);
		$middlename = trim($_REQUEST["middlename"]);
		$lastname = trim($_REQUEST["lastname"]);
		$email = trim($_REQUEST["email"]);

		$sql= $conn->prepare("UPDATE students SET firstname=:firstname, middlename=:middlename, lastname=:lastname, email=:email WHERE id={$id}");
		
		$sql->bindParam(':firstname', $firstname);
		$sql->bindParam(':middlename', $middlename);
		$sql->bindParam(':lastname', $lastname);
		$sql->bindParam(':email', $email);

		$sql->execute();

		$conn = NULL;
		$sql = NULL;
    }
    public function delete(){
        //database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();

		$id = $_REQUEST["id"];

		$sql = $conn->prepare("DELETE FROM students WHERE id = $id");
		$sql->execute();

		//close connection
		$conn = NULL;
		$sql = NULL;
    }
    public function search(){
        //database connection
		$auth = new Auth();
		$conn = $auth->checkAuth();
		
		$firstname = $_REQUEST["fname"];

		$sql = $conn->prepare("SELECT * FROM `students` WHERE `firstname` LIKE '%".$firstname."%' ORDER BY `id` DESC");

		if ($sql->execute()) {
  		// output data of each row
  		while($row = $sql->fetch()) {
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
				<!-- <button class="btn-edit" onclick="edit()" value = <?php echo $row['id'];?>>
				edit
				</button>
				<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
				delete
				</button> -->
				<div class="dropdown">
  					<div class="dropbtn"></div>
					<div class="dropdown-content">
						<button class="btn-edit" onclick="edit()" value = <?php echo $row['id'];?>>
							edit
						</button>
						<button class="btn-delete" onclick="deleteData()" value = <?php echo $row['id'];?>>
							delete
						</button>
					</div>
				</div>
			</td>
		</tr> 
		<?php
		  }
		} else {
		  echo "0 results";
		}
		// $conn->close();
		$conn = NULL;
		$sql = NULL;
    }
}