<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<input type="text" name="firstname" id="first-name">

<button onclick="submit()">Submit</button>

<br>
<br>
<br>
<div id="table-container">
	<table>
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Operations</th>
		</tr>
		<tbody id="result">
		</tbody>
	</table>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <input type="text" name="firstname-edit" id="firstname-edit">
    <br>
    <br>
    <button id="update" onclick="update()">Update</button>
  </div>
</div> 

<script src="js/index.js"></script>
</body>
</html>