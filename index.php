<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/breakpoints.css">
</head>
<body>
<div class="container">
  <div class="card">
    <div class="content">
        <div class="add-container">
          <button id="add-records" class="add-btn" onclick="addRecords()">+ Add Records</button>
        </div>
      <br>
      <br>
      <div class="search-container">
        <input type="text" name="search-names" placeholder="search" class="search-txt" id="searchName" oninput="searchName()">
      </div>
      <div id="table-container" class="table-container">
        <table id="data-list">
          <thead>
            <tr>
              <th>ID</th>
              <th>Firstname</th>
              <th>Middlename</th>
              <th>Lastname</th>
              <th>Email</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody id="result" class="list">
          </tbody>
          <tr class="pagination"></tr>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Edit Modal -->
<div id="editModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
  <span class="close" id="editClose">&times;</span>
    <div class="main-content">
      <input type="text" class="input edit-txt" name="firstname-edit" id="firstname-edit" required>
      <br>
      <br>
      <input type="text" class="input edit-txt" name="middlename-edit" id="middlename-edit" required>
      <br>
      <br>
      <input type="text" class="input edit-txt" name="lastname-edit" id="lastname-edit" required>
      <br>
      <br>
      <input type="text" class="input edit-txt" name="email-edit" id="email-edit" required>
      <br>
      <br>
      <div class="btn-container">
        <button id="update" class="update-btn" onclick="update()">Update</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="modal">
  <!-- Modal content -->
      <div class="modal-content">
        <span class="close" id="addClose">&times;</span>
        <div class="main-content">
            <input type="text" class="input add-txt" placeholder="firstname" name="firstname" id="firstname" required>
            <br>
            <br>
            <input type="text" class="input add-txt" placeholder="middlename" name="middlename" id="middlename" required>
            <br>
            <br>
            <input type="text" class="input add-txt" placeholder="lastname" name="lastname" id="lastname" required>
            <br>
            <br>
            <input type="text" class="input add-txt" placeholder="email" name="email" id="email" required>
            <br>
            <br>
            <div class="btn-container">
              <button id="update" class="submit-btn" onclick="submit()">Add</button>
            </div>
        </div>
      </div>
</div> 
<script src="js/list.js"></script>
<script src="js/index.js"></script>
<script type="text/javascript">

</script>
</body>
</html>