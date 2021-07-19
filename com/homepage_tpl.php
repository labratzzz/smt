<div id="content">
<div class="homebox">
	<div class="homebox-head"><span>Личная страница</span></div>
	<div class="homebox-body">
		<h1><?php echo ($_SESSION['userid'] == -5) ? 'Администратор' : "Пользователь: {$_SESSION['firstname']} {$_SESSION['lastname']}"?></h1>
		<div class="userparam">
			<label>Имя</label>
			<input id="firstname" value="<?php echo $_SESSION['firstname']; ?>">
			<button class="btn">Сменить</button>
		</div>
		<div class="userparam">
			<label>Фамилия</label>
			<input id="lastname" value="<?php echo $_SESSION['lastname'];?>" >
			<button class="btn">Сменить</button>
		</div>
		<div class="userparam">
			<label>E-Mail</label>
			<input id="email" value="<?php echo $_SESSION['email'];?>">
			<button class="btn">Сменить</button>
		</div>
		<div class="userparam">
			<label>Старый пароль</label>
			<input id="oldpass" type="password"><br>
			<label>Новый пароль</label>
			<input id="newpass" type="password">
			<button class="btn">Сменить</button>
		</div>
		<div class="adminparam center-box">
				<a class="btn" href = "http://smt/feedback/index.php">Отправить отзыв</a>
			</div>
	</div>
	<div class="homebox-foot"><a href="logout.php">Выход</a></div>
</div>
</div>