$('document').ready(function() {
	$('.prev-page').on('click', prevPageRedirect);
	$('.next-page').on('click', nextPageRedirect);
	$('.desc').on('click', descSort);
	$('.asc').on('click', ascSort);
	$('.to-cart-button').on('click', addToCart);
});

var url = new URL(window.location.href);
var pcount = !url.searchParams.get('pcount') ? 0 : url.searchParams.get('pcount');

function prevPageRedirect() {
	if (pcount > 0) url.searchParams.set('pcount', parseInt(pcount) - 1);
	window.location.href = url.href;
}

function nextPageRedirect() {
	url.searchParams.set('pcount', parseInt(pcount) + 1);
	window.location.href = url.href;
}

function descSort() {
	var url = new URL(window.location.href);
	url.searchParams.set('sort', 'asc');
	window.location.href = url.href;
}

function ascSort() {
	var url = new URL(window.location.href);
	url.searchParams.set('sort', 'desc');
	window.location.href = url.href;
}

function addToCart() {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (this.readyState != 4) return;

		if (this.status != 200) {
			console.log('Request error: ' + (this.status ? this.statusText : 'bad request'));
		}

		console.log(this.responseText);
		alert(this.responseText);
	};

	xhr.open("POST", "../cart/tocart.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("id=" + $(this).attr('data-id'));
	console.log('sendData() executed to end');
}