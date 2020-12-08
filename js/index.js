

async function submit(){
	create()
}
// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 

const create  = (()=>{
	const firstName = document.getElementById('first-name').value;
	const request = new XMLHttpRequest();

	request.open("GET","http://127.0.0.1:8080/ajax/crud/php/create.php?data=" + firstName, true);
	request.onload = function(){

	read()
	}
	request.send();
})

const read = (()=>{
	const request = new XMLHttpRequest();
	request.open("GET","http://127.0.0.1:8080/ajax/crud/php/read.php");

	request.onload = function(){
	const result = document.getElementById('result').innerHTML  = this.responseText

	}
	request.send();
})
read()

const edit = (()=>{
	const target = event.target || event.srcElement;
	const id = target.id;

	const request = new XMLHttpRequest();
	request.open("GET","http://127.0.0.1:8080/ajax/crud/php/edit.php?id=" + id, true);

	request.onload = function(){
	//split the result into array
	const resultArray = this.responseText.split(' ');
	//set id value for update button
	const btnUpdate = document.getElementById('update').value = resultArray[0];
	//set value for input box at modal
	const firstname = document.getElementById('firstname-edit').value  = resultArray[1];

	modal.style.display = "block";
	//view result on modal
	}
	request.send();
})

const update = (()=>{
	const target = event.target || event.srcElement;
	const value = target.value;
	const firstname = document.getElementById('firstname-edit').value;
	
	const request = new XMLHttpRequest();
	// request.open("GET","http://127.0.0.1:8080/ajax/crud/php/edit.php?id=" + id, );
	request.open("GET", `http://127.0.0.1:8080/ajax/crud/php/update.php?id=${value}&fname=${firstname}`, true);
	request.onload = function(){
	// console.log(this.responseText)
	read();
	}
	request.send();
})

//add function that will create pop-up cards for adding records.

//add function that will create pop-up cards for editing records.