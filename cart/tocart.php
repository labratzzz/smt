<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

if (!$_SESSION['userid']) { echo "Представьтесь системе, чтобы добавлять товар в корзину"; exit(); }

if ($_POST['id']) {
	$id_product = $_POST['id'];
	$db = new MyDB;
	$db->connect();
	$q = "SELECT * FROM `smt_db`.`cart` WHERE `id_user` = {$_SESSION['userid']} && `id_product` = {$id_product}";
	$db->run($q);
	if (mysqli_num_rows($db->result) == 1) {
		$q = "UPDATE `smt_db`.`cart` SET `count` = `count` + 1 WHERE `id_user` = {$_SESSION['userid']} && `id_product` = {$id_product}";
	} else {
		$q = "INSERT INTO `smt_db`.`cart` VALUES ({$_SESSION['userid']}, {$id_product}, 1)";
	}
	$db->run($q);

	echo "Товар успешно добавлен в корзину";
	unset($db);
}
	
?>