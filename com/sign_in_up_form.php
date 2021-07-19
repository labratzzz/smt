<div id="content">
	<div class="loginform">
		<div class="login-left">
			<div class="login-left-head flex-cen-hor"><span>Регистрация</span></div>
			<div class="login-body flex-cen-ver">
				<form method="post">
					<div class="control-holder-left">
						<div class="login-col">
							<div class="form-control">
								<label>Имя</label>
								<input id="regfname" type="text" name="firstname" required>
							</div>
							<div class="form-control">
								<label>Электронная почта</label>
								<input id="regemail" type="text" name="email" required>
							</div>
							<div class="form-control-radio">
								<label>Пол</label>
								<div>
									<label><input type="radio" name="sex" value = "male" checked>Мужской</label>
									<label><input type="radio" name="sex" value = "female">Женский</label>
								</div>
							</div>
						</div>
						<div class="login-col">
							<div class="form-control">
								<label>Фамилия</label>
								<input id="reglname" type="text" name="lastname" required>
							</div>
							<div class="form-control">
								<label>Пароль</label>
								<input id="regpass" type="text" name="password" required>
							</div>
						</div>
					</div>
					<button id="regbtn" class = "btn">Зарегистрироваться</button>
				</form>
			</div>
		</div>
		<div class="login-right">
			<div class="login-right-head flex-cen-hor"><span>Вход</span></div>
			<div class="login-body flex-cen-ver">
				<form action="validation.php" method="post">
					<div class="control-holder-right">
						<div class="form-control">
							<label>Электронная почта</label>
							<input id="logemail" type="text" name="email" required>
						</div>
						<div class="form-control">
							<label>Пароль</label>
							<input id = "logpass" type="password" name="password" required>
						</div>
					</div>
					<button id="logbtn" type = "submit" class = "btn">Войти</button>
				</form>
			</div>
		</div>
	</div>
</div>