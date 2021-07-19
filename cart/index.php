<?php session_start();
//----------|Using|----------
define("INDEX", "");
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

if (!$_SESSION['userid']) header('location:../index.php');

//----------|Page Head|----------
$page_title = "СМТ - сайт цифровой техники";
$page_styles = css_link('../css/main.css');
$page_styles .= css_link('../css/cart.css');
$page_styles .= css_link('../css/homepage.css');
$page_scripts =  js_link('../js/jquery-3.4.1.min.js');
$page_scripts .= js_link('cart.js');
$cart_price = 0;

include_once ($_SERVER[DOCUMENT_ROOT]."/com/doc_head.php");
include_once ($_SERVER[DOCUMENT_ROOT]."/com/header.php");

//----------|Page Content|----------
include_once ($_SERVER[DOCUMENT_ROOT]."/com/cart_top.php");

$count = 0;
$total = 0;

$db = new MyDB();
$db->connect();
$q = "SELECT `id`, `name`, `count`, `price` FROM `smt_db`.`cart` AS c INNER JOIN `smt_db`.`products` AS p ON c.`id_product` = p.`id` WHERE `id_user` = {$_SESSION['userid']}";
$db->run($q);
$row_num = mysqli_num_rows($db->result);
for ($i=0; $i<$row_num; $i++) { 
$db->row();
$id = $db->data['id'];
$image = '../prod_img/'.mysqli_fetch_row(mysqli_query($db->link, "SELECT `image_path` FROM `smt_db`.`images` WHERE `id_product` = {$db->data['id']} LIMIT 1"))[0];
$caption = $db->data['name'];
$quan = $db->data['count'];
$price = $db->data['price'] * $quan;
$count += $quan;
$total += $price;
include ($_SERVER[DOCUMENT_ROOT]."/com/cart_item.php");
}

unset($db);

include_once ($_SERVER[DOCUMENT_ROOT]."/com/cart_bottom.php");
//----------|Page Footer|----------
include_once ($_SERVER[DOCUMENT_ROOT]."/com/footer.php");
//----------|Functions|----------
?>