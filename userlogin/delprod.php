<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

if ($_POST['id']) {
	$db = new MyDB;
	$db->connect();
	$q = "DELETE FROM `smt_db`.`products` WHERE `id` = {$_POST['id']}";
	$db->run($q);
	unset($db);
	echo 'Товар успешно удален';
}
?>