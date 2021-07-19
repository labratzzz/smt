$('document').ready(function() {
	$('#regbtn').on('click', register);
	$('#logbtn').on('click', login);
});

function register() {
	var s1 = $('#regfname').val();
	var s2 = $('#reglname').val();
	var s3 = $('#regemail').val();
	var s4 = $('#regpass').val();
	var s5 = 0;

	if (!s1 || s1.length == 0) 
		{ alert("Поле 'Имя' заполнено некорректно"); return; }
	if (!s2 || s2.length == 0) 
		{ alert("Поле 'Фамилия' заполнено некорректно"); return; }
	if (!s3 || s3.length == 0 || !validateEmail(s3)) 
		{ alert("Поле 'Электронная почта' заполнено некорректно"); return; }
	if (!s4 || s4.length < 6) 
		{ alert("Поле 'Пароль' заполнено некорректно. Пароль должен состоять минимум из 6 символов"); return; }
	var request = "firstname="+s1+"&lastname="+s2+"&email="+s3+"&password="+s4+"&sex="+s5;
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

	xhr.open("POST", "registration.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(request);
	console.log('sendData() executed to end');	
}

function login() {
	//alert('log');
	//return;
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