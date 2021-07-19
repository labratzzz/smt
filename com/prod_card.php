<div class="prod-card">
			<a class="prod-card-pic" href = "../product/?id=<?php echo $prod_id; ?>">
				<img src="<?php echo $prod_img; ?>">
			</a>
			<div class="prod-card-rate">
				<div class="star"></div>
				<div class="star-connector"></div>
				<div class="star"></div>
				<div class="star-connector"></div>
				<div class="star"></div>
				<div class="star-connector"></div>
				<div class="star"></div>
				<div class="star-connector"></div>
				<div class="star"></div>
			</div>
			<div class="prod-card-gen">
				<a class="prod-card-sign" href = "../product/?id=<?php echo $prod_id; ?>"><?php echo $prod_name; ?></a>
				<span class="prod-card-price"><?php echo $prod_price; ?></span>
				<button class="to-cart-button" data-id = "<?php echo $prod_id; ?>">В корзину</button>
				</div>
		</div>