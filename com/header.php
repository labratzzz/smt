<body>
	<header>
	<div id = "headert">
		<div class = "btn-group white-text univers">
			<div>
				<a href = "#">Продукты</a>
			</div>
			<div>
				<a href = "#">Сотрудничество</a>
			</div>
			<div>
				<a href = "#">Услуги</a>
			</div>
		</div>
		
	</div>
	<div id = "headerb">
			<div id = "logo-holder" class = "disable-select">
			<a href = "http://smt/index.php">
				<span class = "logo">SMT</span><br>
				<span id = "tagline">Делаем мир проще</span>
			</a>
			</div>
			<div id = "contact-panel">
				<span class = "univers">Энгельс</span><br>
				<span class = "univers">ул. Демократическая, 1</span><br>
				<span class = "icon icon-phone"></span>
				<span class = "univers">8 800 900 64 35</span>
			</div>
			<div id = "usertools">
				<div id = "scart">
					<div class = "nameholder">
						<a href = "http://smt/cart/index.php">Корзина</a>
					</div>
					<div class = "round">
						<a  class = "icon-shopping-cart" href = "http://smt/cart/index.php"></a>
					</div>
					<div class = "subs">
					<span><?php if (!$_SESSION['userid']) echo "Войдите в систему"; ?></span>
					<!-- Сумма<br><b><?php echo ($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0; ?></b> -->
					</div>
				</div>
				<div id = "account">
					<div class = "nameholder">
						<a href = "http://smt/userlogin/home.php"><?php echo ($_SESSION['userid']) ? "{$_SESSION['firstname']} {$_SESSION['lastname']}" : "Вы не представились системе"; ?></a>
					</div>
					<div class = "round">
						<a class = "icon-user" href = "http://smt/userlogin/home.php"></a>
					</div>
					<div class = "subs">
					<a href = "http://smt/userlogin/home.php"><b>Вход</b></a><br>
					<a href = "http://smt/userlogin/home.php">Регистрация</a>
					</div>
				</div>
			</div>
	</div>
	</header>