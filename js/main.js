var cart = {};

$(document).ready(function() {
   $('.to-cart-button').click(function(e) {
       e.preventDefault(); //вместо return false
       
       addToCart(); //вызываем функцию и передаем ей id
   });
});

function addToCart() {
	var id = $(this).attr('data-id');

	if (cart[id] != undefined){
		cart[id]++;
	}
	else
	{
		cart[id] = 1;
	}

	console.log(cart);
}