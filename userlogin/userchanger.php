<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$db = new MyDB;
$db->connect(); 

switch ($_POST['code']) {
	case 1: //firstname
	$q = "UPDATE `smt_db`.`users` SET `firstname` = {$_POST['fname']} WHERE `id` = {$_SESSION['userid']}";
		$db->run($q);
		$_SESSION['firstname'] = $_POST['fname'];
		echo 'Имя успешно изменено';
		break;
	case 2: //lastname
	$q = "UPDATE `smt_db`.`users` SET `lastname` = {$_POST['lname']} WHERE `id` = {$_SESSION['userid']}";
		$db->run($q);
		$_SESSION['lastname'] = $_POST['lname'];
		echo 'Фамилия успешно изменена';
		break;
	case 3: //email
	$q = "SELECT * FROM `smt_db`.`users` WHERE `email` = '{$_POST['email']}'";
	$db->run($q);
	$row_num = mysqli_num_rows($db->result);
	if ($row_num == 1) { 
		echo 'Данный электронный адрес уже занят другим пользователем';
	} else {
		$q = "UPDATE `smt_db`.`users` SET `email` = '{$_POST['email']}' WHERE `id` = {$_SESSION['userid']}";
		$db->run($q);
		$_SESSION['email'] = $_POST['email'];
		echo 'Электронная почта успешно изменена';
	} 
		break;
	case 4: //password
	$q = "SELECT `password` FROM `smt_db`.`users` WHERE `id` = {$_SESSION['userid']}";
	$db->run($q);
	$db->row($q);
	if ($db->data['password'] == $_POST['opass']) {
		$q = "UPDATE `smt_db`.`users` SET `password` = '{$_POST	['npass']}' WHERE `id` = {$_SESSION['userid']}";
		$db->run($q);
		$_SESSION['password'] = $_POST['npass'];
		echo 'Пароль успешно изменен';
	} else {
		//echo "|{$_SESSION['userid']}| |{$db->data['password']}| |{$_POST['opass']}|";
		echo "Неверно указан старый пароль";
	}
		break;
}
?>