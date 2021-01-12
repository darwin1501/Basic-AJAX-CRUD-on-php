

const submit = (()=>{
	//check if there's an empty string
	const addTxt = document.getElementsByClassName('add-txt');
	const value = [];
	for(i of addTxt){
		value.push(i.value)
	}
	if(value.includes("")){
		alert('dont leave empty fields');
	}else{
		create();
	}
})
const createPagination = (()=>{
	 let recordList = new List('data-list', {
		  valueNames: ['name'],
		  page: 3,
		  pagination: true
		});

	 return recordList;
})

//modal config

var editModal = document.getElementById("editModal");
var addModal = document.getElementById("addModal");
// Get the <span> element that closes the modal
var editClose = document.getElementById("editClose");
var addClose = document.getElementById("addClose");

// When the user clicks on <span> (x), close the modal
editClose.onclick = function() {
  editModal.style.display = "none";
}
addClose.onclick = function(){
	addModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
  if (event.target == addModal) {
    addModal.style.display = "none";
  }
}

const addRecords = (()=>{
	addModal.style.display = "block";
})
 
const create  = (()=>{
	const firstname = document.getElementById('firstname').value;
	const middlename = document.getElementById('middlename').value;
	const lastname = document.getElementById('lastname').value;
	const email = document.getElementById('email').value;

	const request = new XMLHttpRequest();
	// request.open("GET", `http://127.0.0.1:8080/ajax/crud/php/update.php?id=${id}&fname=${firstname}`, true);
	request.open("GET",`http://localhost:8080/pdo/crud/php/command.php?command=create
					&firstname=${firstname}
					&middlename=${middlename}&lastname=${lastname}
					&email=${email}`, true);
	request.onload = function(){
		//response from email validation at create function on operations.php
		if(this.responseText == 'false'){
			alert('email is not valid');
		}else{
		read()
			//clear inputs after submit
			document.getElementById('firstname').value = "";
			document.getElementById('middlename').value = "";
			document.getElementById('lastname').value = "";
			document.getElementById('email').value = "";

			alert('succesfully added');
		}
	}
	request.send();
})

const read = (()=>{
	const request = new XMLHttpRequest();
	request.open("GET","http://localhost:8080/pdo/crud/php/command.php?command=read", true);

	request.onload = function(){
	const result = document.getElementById('result').innerHTML  = this.responseText;
	createPagination();
	}
	request.send();
})
read()

const edit = (()=>{
	const target = event.target || event.srcElement;
	const id = target.value;

	const request = new XMLHttpRequest();
	request.open("GET","http://localhost:8080/pdo/crud/php/command.php?command=edit&id=" + id, true);
	request.onload = function(){
	//convert to JSON
	const resultArray = JSON.parse(this.responseText);
	//set id value for update button
	const btnUpdate = document.getElementById('update').value = resultArray.id;
	// //set value for input box at modal
	const firstname = document.getElementById('firstname-edit').value  = resultArray.firstname;
	const middlename = document.getElementById('middlename-edit').value  = resultArray.middlename;
	const lastname = document.getElementById('lastname-edit').value  = resultArray.lastname;
	const email = document.getElementById('email-edit').value  = resultArray.email;
	//view result on modal
	editModal.style.display = "block";
	}
	request.send();
})

const update = (()=>{
	const target = event.target || event.srcElement;
	const id = target.value;
	const firstname = document.getElementById('firstname-edit').value;
	const middlename = document.getElementById('middlename-edit').value;
	const lastname = document.getElementById('lastname-edit').value;
	const email = document.getElementById('email-edit').value;
	const fnameOnEdit = document.getElementById('firstname-edit');
	
	const request = new XMLHttpRequest();
	request.open("GET", `http://localhost:8080/pdo/crud/php/command.php?
						command=update&id=${id}&firstname=${firstname}
						&middlename=${middlename}&lastname=${lastname}
						&email=${email}`, true);
	request.onload = function(){
	//response from email validation at create function on operations.php
		if(this.responseText == 'false'){
			alert('email is not valid');
		}else{
			read();
		alert('succesfully updated');
		}
	}
	//check if there's an empty string
	const editTxt = document.getElementsByClassName('edit-txt');
	const value = [];
	for(i of editTxt){
		value.push(i.value)
	}
	if(value.includes("")){
		alert('dont leave empty fields');
	}else{
		request.send();
	}
})

const deleteData = (()=>{
	//get the ID
	const target = event.target || event.srcElement;
	const id = target.value;
	const request = new XMLHttpRequest();
	//pass the ID on php
	request.open("GET", `http://localhost:8080/pdo/crud/php/command.php?command=delete&id=${id}`, true);
	request.onload = function(){
		read()
	}
	if(confirm('Delete?') === true){
		request.send();
	alert('deleted');
	}
})

const searchName = (()=>{
	const target = event.target || event.srcElement;
	const value = target.value;

	const request = new XMLHttpRequest();
	request.open("GET", `http://localhost:8080/pdo/crud/php/command.php?command=search&fname=${value}`, true);
	request.onload = function(){
		const result = document.getElementById('result').innerHTML  = this.responseText;
		createPagination();
	}
	request.send();
})
