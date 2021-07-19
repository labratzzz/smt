</div>
				<div class="cart-info">
					<span class="total"><b>ИТОГО: </b><?php echo $total; ?> <b>₽</b></span>
					<span class="count"><b>КОЛ-ВО: </b><?php echo $count; ?> <b>шт.</b></span>
				</div>
				<div class="cart-footer"></div>
			</div>
			<div class="order">
				<div class="order-header">Заказ</div>
				<div class="order-body">
					<form action="order.php" method="post">
						<div class="adminparam center-box">
							<label>Доставка</label>
							<select id="deliv"  name="man">
								<option value="1">Самовывоз</option>
								<option value="2">Доставка курьером</option>
							</select>
						</div>
						<div id="self">
							
						</div>
						<div id="delivery">
							<div class="adminparam center-box">
								<label>Населенный пункт</label>
								<input type="" name="punkt">
							</div>
							<div class="adminparam center-box" id="dost">
								<label>Улица</label>
								<input name="street">
								<label>Дом</label>
								<input type="" name="house"  style="width: 50px">
								<label>Квартира</label>
								<input type="" name="apartment" style="width: 50px">
							</div>
						</div>
						<div class="adminparam center-box">
							<button class="btn" type="submit">Оформить заказ</button>
						</div>
					</form>
				</div>
		</div>

	</div>