$('document').ready(function() {
	$('.to-cart-button').on('click', addToCart);
});

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