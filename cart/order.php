<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$db = new MyDB;
$db->connect();
$q = "DELETE FROM `smt_db`.`cart` WHERE `id_user` = {$_SESSION['userid']}";
$db->run($q);
unset($db);

header('location:http://smt/success.php');
?>