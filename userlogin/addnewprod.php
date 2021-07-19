<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$db = new MyDB;
$db->connect();
$q = "INSERT INTO `smt_db`.`products` (`name`, `description`, `id_category`, `id_manufacterer`, `price`) VALUES ('{$_POST['name']}', '{$_POST['desc']}', {$_POST['cat']}, {$_POST['man']}, {$_POST['price']})";
$db->run($q);

$q = "SELECT `id` FROM `smt_db`.`products` ORDER BY id DESC LIMIT 1";
$db->run($q); $db->row();
$id = $db->data['id'];

$countfiles = count($_FILES['file']['name']);
if ($countfiles > 4) $countfiles = 4;
$directory = $_SERVER[DOCUMENT_ROOT].'/prod_img/';

for ($i=0;$i<$countfiles; $i++) {
//$q = "SELECT * FROM `smt_db`.`images` WHERE `image_path` = 'prod_img/{$_FILES['file']['name'][$i]}'";
$filename = $_FILES['file']['name'][$i];
$q = "INSERT INTO `smt_db`.`images` (`id_product`, `image_path`) VALUES ({$id}, '{$filename}')";
$db->run($q);
move_uploaded_file($_FILES['file']['tmp_name'][$i], $directory.$filename);
}

unset($db);
header('location:admin.php');
?>