$('document').ready(function() {
	$('.del-btn').on('click', deleteItem);
	$('.count-btn-minus').on('click', decItem);
	$('.count-btn-plus').on('click', incItem);
	$('.count-inp').on('input', inputVal);
	$('#deliv').on('change', deliver);
	$('#delivery').hide();
});


function sumStrings(a,b) { 
  return ((BigInt(a)) + BigInt(b)).toString();
}
function inputVal() {
	this.value = limiter(this.value, 1, 10);
}
function limiter(value, min, max) {
	if (parseInt(value) < min || isNaN(parseInt(value))) return min;
	else if (parseInt(value) > max) return max;
	else return value;
}

function deliver() {
	if ($('#deliv').val() == 1) $('#delivery').hide();
	else $('#delivery').show();
}


function reCalc(prevValue, elem) {
	var totalItemPrice = parseInt($(elem).parent().parent().find('.item-price')[0].innerHTML);
	var oneItemPrice = totalItemPrice / prevValue;

	var totalPrice = parseInt($('.total')[0].textContent.split(' ')[1]);
	var totalCount = parseInt($('.count')[0].textContent.split(' ')[1]);

	var count = elem.val();
	var diff = -(prevValue - count);
	$(elem).parent().parent().find('.item-price')[0].innerHTML = sumStrings(totalItemPrice, oneItemPrice * diff);
	$('.total')[0].innerHTML = "<b>ИТОГО: </b>" + sumStrings(totalPrice, oneItemPrice * diff) + " <b>₽</b>";
	$('.count')[0].innerHTML = "<b>КОЛ-ВО: </b>" + sumStrings(totalCount, diff) + " <b>шт.</b>";
}

function deleteItem() {
	var totalPrice = $('.total')[0].textContent.split(' ')[1];
	var totalCount = parseInt($('.count')[0].textContent.split(' ')[1]);
	var totalItemPrice = $(this).parent().parent().find('.item-price')[0].innerHTML;
	var totalItemCount = $(this).parent().parent().find('.count-inp')[0].value;

	$('.total')[0].innerHTML = "<b>ИТОГО: </b>" + (totalPrice - totalItemPrice) + " <b>₽</b>";
	$('.count')[0].innerHTML = "<b>КОЛ-ВО: </b>" + (totalCount - totalItemCount) + " <b>шт.</b>";

	$(this).parent().parent().parent().remove();
	sendData("id=" + $(this).attr('data-id') + "&do=1");	
}
function decItem() {
	var count = $(this).next().val();
	if (count == 1) return;
	$(this).next().val(count - 1);
	reCalc(count, $(this).next());

	sendData("id=" + $(this).attr('data-id') + "&do=2");
}
function incItem() {
	var count = parseInt($(this).prev().val());
	if (count == 10) return;
	$(this).prev().val(sumStrings(count, 1));
	reCalc(count, $(this).prev());
	
	sendData("id=" + $(this).attr('data-id') + "&do=3");
}

function sendData(request) {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (this.readyState != 4) return;

		if (this.status != 200) {
			console.log('Request error: ' + (this.status ? this.statusText : 'bad request'));
		}

		console.log(this.responseText);
	};

	xhr.open("POST", "../cart/cartoperator.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(request);
	console.log('sendData() executed to end');
}