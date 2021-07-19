<div id = "content">
		<div class="product-view">
			<div class="product-view-header"><?php echo $prod_category; ?></div>
			<div class="product-view-caption"><?php echo $prod_caption; ?></div>
			<div class="product-view-content">
				<div class="product-view-pic-area">
					<div class="pic-top">
						<div class="picgen"><img src = <?php echo $picgen; ?>></div>
					</div>
					<div class="pic-bottom">
						<div class="pic1"><img src = <?php echo $pic1; ?>></div>
						<div class="pic2"><img src = <?php echo $pic2; ?>></div>
						<div class="pic3"><img src = <?php echo $pic3; ?>></div>
					</div>
				</div>
				<div class="product-view-desc">
					<div>Описание</div>
					<span><?php echo $prod_desc; ?></span>
				</div>
				<div class="product-view-right-side">
					<div class="product-view-man-box">
						<div>Производитель</div>
						<span><?php echo $prod_manuf; ?></span>
					</div>
					<div class="product-view-avaiable-box">
						<div>Наличие</div>
						<span><?php echo $prod_avaib; ?></span>
					</div>
					<div class="product-view-buy-box">
						<span><?php echo $prod_price; ?></span>
						<button class="buy-button" data-id = <?php echo $id; ?>><?php echo ($_SESSION['admin']) ? 'УДАЛИТЬ' : 'КУПИТЬ'; ?></button>
					</div>
				</div>
			</div>
		</div>
	</div>