<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$db = new MyDB;
$db->connect();

$email = $_POST['email'];
$pass = $_POST['password'];

if ($email === 'admin' && $pass === '[1333haloeemesix]') {
	session_destroy();
	session_start();
	$_SESSION['admin'] = 'yes';
	unset($db);
	header('location:admin.php');
}

$q = "SELECT * FROM `smt_db`.`users` WHERE `email` = '{$email}' && `password` = '{$pass}'";
$db->run($q);
$rows_num = mysqli_num_rows($db->result);

if ($rows_num == 1) {
	session_destroy();
	session_start();
	$q = "SELECT `id`, `firstname`, `lastname`, `email`, `password` FROM `smt_db`.`users` WHERE `email` = '{$email}'";
	$db->run($q);
	$db->row();
	$_SESSION['userid'] = $db->data['id'];
	$_SESSION['firstname'] = $db->data['firstname'];
	$_SESSION['lastname'] = $db->data['lastname'];
	$_SESSION['email'] = $db->data['email'];
	$_SESSION['password'] = $db->data['password'];

	unset($db);
	header('location:home.php');
}
else {
	unset($db);
	header('location:login.php');
}


?>