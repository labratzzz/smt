<div class = "cart-item-box">
	<div class="cart-item-img"><a href="../product/?id=<?php echo $id; ?>"><img src="<?php echo $image; ?>"></a></div>
	<div class="cart-item-caption"><a href="../product/?id=<?php echo $id; ?>"><?php echo $caption; ?></a></div>
	<div class="cart-item-cpanel">
		<div class="delete-box"><button class="del-btn" data-id="<?php echo $id; ?>"></button></div>
		<div class="count-box">
			<button class="count-btn count-btn-minus" data-id="<?php echo $id; ?>"></button>
			<input class="count-inp" value="<?php echo $quan; ?>">
			<button class="count-btn count-btn-plus" data-id="<?php echo $id; ?>"></button>
		</div>
		<div class="price-box">
			<span class="item-price"><?php echo $price; ?></span>
			<span class="money-ruble"></span>
		</div>
	</div>
</div>