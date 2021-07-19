<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

if ($_POST['theme']) {
	$re = $_POST['theme'];
	$desc = $_POST['desc'];
	$date = date('Y-m-d H-i-s');
	$myfile = fopen("feed/{$date}_UID{$_SESSION['userid']}.txt", "w") or die("Unable to open file!");
	fwrite($myfile, "Пользователь: {$_SESSION['firstname']} {$_SESSION['lastname']} \r\n");
	fwrite($myfile, "Электронная почта: {$_SESSION['email']} \r\n");
	fwrite($myfile, "Дата: {$date} \r\n");
	fwrite($myfile, "Тема: {$re} \r\n");
	fwrite($myfile, "Отзыв: {$desc} \r\n");
	fclose($myfile);

	header('location:index.php');
}
?>