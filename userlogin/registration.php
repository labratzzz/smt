<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$db = new MyDB;
$db->connect();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$sex = ($_POST['sex'] == 'male') ? 0 : 1;

$q = "SELECT * FROM `smt_db`.`users` WHERE `email` = '{$email}'";
$db->run($q);
$rows_num = mysqli_num_rows($db->result);

if ($rows_num == 1) {
	echo "В базе данных уже существует пользователь с таким электронным адресом";
	unset($db);
}
else {
	$regq = "INSERT INTO `smt_db`.`users` (`firstname`, `lastname`, `sex`, `email`, `password`) VALUES ('{$firstname}', '{$lastname}', {$sex}, '{$email}', '{$pass}')";
	$db->run($regq);
	echo "Пользователь {$firstname} {$lastname} зарегистрирован";
	unset($db);
}

?>