<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<button id="add-records" onclick="addRecords()">Add Records</button>
<br>
<br>
<input type="text" name="search-names" placeholder="search" id="searchName" oninput="searchName()">
<br>
<br>
<div id="table-container">
	<table id="data-list">
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Operations</th>
		</tr>
		<tbody id="result" class="list">
		</tbody>
    <tr class="pagination"></tr>
	</table>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="editClose">&times;</span>
    <input type="text" class="input" name="firstname-edit" id="firstname-edit">
    <br>
    <br>
    <button id="update" onclick="update()">Update</button>
  </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" id="addClose">&times;</span>
    <input type="text" class="input" name="firstname" id="firstname">
    <br>
    <br>
    <button id="update" onclick="submit()">Submit</button>
  </div>
</div> 
<script src="js/list.js"></script>
<script src="js/index.js"></script>
<script type="text/javascript">

</script>
</body>
</html>