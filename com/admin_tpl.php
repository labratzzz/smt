<div id="content">
	<div class="homebox">
	<div class="homebox-head"><span>Администратор: добавление товара</span></div>
	<div class="homebox-body">
		<form action="addnewprod.php" method="post" enctype='multipart/form-data'>
			<div class="adminparam center-box">
				<label>Название</label>
				<input id="name" name="name">
			</div>
			<div class="adminparam center-box">
				<label>Описание</label>
				<textarea id="desc" name="desc"></textarea>
			</div>
			<div class="adminparam center-box">
				<label>Производитель</label>
				<select id="man"  name="man">
					<?php include ($_SERVER[DOCUMENT_ROOT]."/com/man_options.php"); ?>
				</select>
			</div>
			<div class="adminparam center-box">
				<label>Категория</label>
				<select id="cat"  name="cat">
					<?php include ($_SERVER[DOCUMENT_ROOT]."/com/cat_options.php"); ?>
				</select>
			</div>
			<div class="adminparam center-box">
				<label>Цена</label>
				<input id="price" name="price">
			</div>
			<div class="adminparam center-box">
				<label>Изображения</label>
				<input type="file" name="file[]" id="file" multiple>
			</div>
			<div class="adminparam center-box">
				<button class="btn" type="submit">Добавить</button>
			</div>
		</form>
	</div>
	<div class="homebox-foot"><a href="logout.php">Выход</a></div>
</div>
</div>