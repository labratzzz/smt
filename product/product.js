$('document').ready(function() {
	$('.pic1 img').on('mouseover', pic1View);
	$('.pic2 img').on('mouseover', pic2View);
	$('.pic3 img').on('mouseover', pic3View);
	$('.pic-bottom img').on('mouseleave', picDef);

	if ($('.buy-button')[0].innerHTML == 'КУПИТЬ') {
		$('.buy-button').on('click', buyFunction); 
	} else {
		$('.buy-button').on('click', deleteItem);
	}
});

var url = new URL(window.location.href);
var id = !url.searchParams.get('id') ? 1 : url.searchParams.get('id');

function buyFunction() {
	sendData("../cart/tocart.php", "id=" + id);
}

function deleteItem () {
	sendData("../userlogin/delprod.php", "id=" + id);
	history.go(-1);
}

var swap1, swap2; var parentElement;
function pic1View() {
	swap1 = $('.pic1 img')[0].getAttribute('src');
	swap2 = $('.picgen img')[0].getAttribute('src');
	parentElement = $('.pic1 img')[0];
	$('.pic1 img')[0].setAttribute('src', swap2);
	$('.picgen img')[0].setAttribute('src', swap1);
}
function pic2View() {
	swap1 = $('.pic2 img')[0].getAttribute('src');
	swap2 = $('.picgen img')[0].getAttribute('src');
	parentElement = $('.pic2 img')[0];
	$('.pic2 img')[0].setAttribute('src', swap2);
	$('.picgen img')[0].setAttribute('src', swap1);
}
function pic3View() {
	swap1 = $('.pic3 img')[0].getAttribute('src');
	swap2 = $('.picgen img')[0].getAttribute('src');
	parentElement = $('.pic3 img')[0];
	$('.pic3 img')[0].setAttribute('src', swap2);
	$('.picgen img')[0].setAttribute('src', swap1);
}
function picDef() {
	parentElement.setAttribute('src', swap1);
	$('.picgen img')[0].setAttribute('src', swap2);	
}

function sendData(file, request) {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (this.readyState != 4) return;

		if (this.status != 200) {
			console.log('Request error: ' + (this.status ? this.statusText : 'bad request'));
		}

		console.log(this.responseText);
		alert(this.responseText);
	};

	xhr.open("POST", file);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(request);
	console.log('sendData() executed to end');
}