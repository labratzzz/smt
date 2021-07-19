$('document').ready(function() {
	$('#firstname').next().on('click', fName);
	$('#lastname').next().on('click', lName);
	$('#email').next().on('click', eMail);
	$('#newpass').next().on('click', nPass);
});

function fName() {
	var fname = $('#firstname').val();
	if (!fname || fname.length == 0) { 
    alert("Поле 'Имя' некорректно");
	return;
  	}
	send('code=1&fname=' + fname);
}

function lName() {
	var lname = $('#lastname').val();
	if (!lname || lname.length == 0) { 
    alert("Поле 'Фамилия' некорректно");
	return;
  	}
	send('code=2&lname=' + lname);
}

function eMail() {
	var email = $('#email').val();
	if (!email || email.length == 0 || !validateEmail(email)) { 
    alert("Адрес электронной почты некорректен");
	return;
  	}
	
	send('code=3&email=' + email);
}

function nPass() {
	var opass = $('#oldpass').val();
	var npass = $('#newpass').val();
	if (!npass || npass.length < 6) { 
    alert("Пароль должен иметь минимальную длину 6 символов");
	return;
  	}
	send('code=4&opass=' + opass + '&npass=' + npass);
}

function send(request) {
	console.log(request);
	var xhr = new XMLHttpRequest();
	var output;
	xhr.onreadystatechange = function() {
		if (this.readyState != 4) return;

		if (this.status != 200) {
			console.log('Request error: ' + (this.status ? this.statusText : 'bad request'));
		}

		console.log(this.responseText);
		alert(this.responseText);
	};

	xhr.open("POST", "userchanger.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(request);
	console.log('sendData() executed to end');	
}



function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validate() {
  var email = $("#email").val();

  if (!validateEmail(email)) {
    alert("Адрес электронной почты некорректен");
  }
  return false;
}