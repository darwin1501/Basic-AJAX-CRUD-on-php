

const submit = (()=>{
	let firstName = document.getElementById('firstname').value;
	const fnameInput = document.getElementById('firstname');
	// console.log(firstName)
	if (firstName === "") {
		fnameInput.classList.add('warning');
		// console.log('warning');
	}else{
		fnameInput.classList.remove('warning');
		create()
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

// required input setting
// document.getElementById('firstname').addEventListener("input", function(){
// 	// console.log('press');
// 	let firstName = document.getElementById('firstname').value;
// 	const fnameInput = document.getElementById('firstname');
// 	// console.log(firstName)
// 	if (firstName === "") {
// 		fnameInput.classList.add('warning');
// 		// console.log('warning');
// 	}else{
// 		fnameInput.classList.remove('warning');
// 		// create()
// 	}
// })

//modal setttings

// Get the modal
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
	const firstName = document.getElementById('firstname').value;
	const middleName = document.getElementById('middlename').value;
	const lastname = document.getElementById('lastname').value;
	const email = document.getElementById('email').value;
	// console.log(typeof firstname)
	// firstname = String(firstname);
	// firstname = firstname.trim();
	// console.log(String(firstname).replace(/\s+/g, ''))
	// firstName = firstname.replace(/\s+/g, '');

	const request = new XMLHttpRequest();
	// request.open("GET", `http://127.0.0.1:8080/ajax/crud/php/update.php?id=${id}&fname=${firstname}`, true);
	request.open("GET",`http://127.0.0.1:8080/ajax/crud/php/create.php?firstname=${firstName}&middlename=${middlename}&lastname=${lastname}&$email=${email}`, true);
	request.onload = function(){
	read()
	document.getElementById('firstname').value = "";
	// console.log(this.responseText)
	}
	request.send();
})

const read = (()=>{
	const request = new XMLHttpRequest();
	request.open("GET","http://127.0.0.1:8080/ajax/crud/php/read.php");

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
	request.open("GET","http://127.0.0.1:8080/ajax/crud/php/edit.php?id=" + id, true);
	request.onload = function(){
	const resultArray = JSON.parse(this.responseText);
	//set id value for update button
	const btnUpdate = document.getElementById('update').value = resultArray.id;
	// //set value for input box at modal
	const firstname = document.getElementById('firstname-edit').value  = resultArray.firstname;
	//view result on modal
	editModal.style.display = "block";
	}
	request.send();
})

const update = (()=>{
	const target = event.target || event.srcElement;
	const id = target.value;
	const firstname = document.getElementById('firstname-edit').value;
	const fnameOnEdit = document.getElementById('firstname-edit');
	
	const request = new XMLHttpRequest();
	request.open("GET", `http://127.0.0.1:8080/ajax/crud/php/update.php?id=${id}&fname=${firstname}`, true);
	request.onload = function(){
	read();
	}
		// console.log(firstName)
	if (firstname === "") {
		fnameOnEdit.classList.add('warning');
		// console.log('warning');
	}else{
		fnameOnEdit.classList.remove('warning');
		request.send();
	}
})

const deleteData = (()=>{
	//get the ID
	const target = event.target || event.srcElement;
	const id = target.value;
	const request = new XMLHttpRequest();
	//pass the ID on php
	request.open("GET", `http://127.0.0.1:8080/ajax/crud/php/delete.php?id=${id}`, true);
	request.onload = function(){
			read()
	}
	if(confirm('Delete?') === true){
	 	// console.log('deleted')
		request.send();
	}
})

const searchName = (()=>{
	const target = event.target || event.srcElement;
	const value = target.value;

	const request = new XMLHttpRequest();
	request.open("GET", `http://127.0.0.1:8080/ajax/crud/php/search.php?fname=${value}`, true);
	request.onload = function(){
		const result = document.getElementById('result').innerHTML  = this.responseText;
		createPagination();
	}
	request.send();
})
