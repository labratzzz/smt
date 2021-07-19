<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");


//----------|Page Head|----------
$page_title = "СМТ - сайт цифровой техники";
$page_styles = 	css_link('../css/main.css');
$page_styles .= css_link('../css/catalog.css');
$page_scripts =  js_link('../js/jquery-3.4.1.min.js');
$page_scripts .= js_link('product.js');
$cart_price = 0;

include_once ($_SERVER[DOCUMENT_ROOT]."/com/doc_head.php");
include_once ($_SERVER[DOCUMENT_ROOT]."/com/header.php");
//----------|Page Content|----------
$id = $_GET["id"];
$db = new MyDB;
$db->connect();
$query = "SELECT `name`, `description`, `id_category`, `id_manufacterer`, `price` FROM `smt_db`.`products` WHERE id = {$id} LIMIT 1";

$db->run($query);
$db->row();

$prod_category = select_one_item($db->link, '`name`', '`smt_db`.`categories`', '`id`', $db->data["id_category"]);
$prod_caption = $db->data["name"];
$prod_desc = $db->data["description"];
$prod_manuf =  select_one_item($db->link, '`name`', '`smt_db`.`manufacterers`', '`id`', $db->data["id_manufacterer"]);
$prod_avaib = 'В наличии';
$prod_price = $db->data["price"] . 'р.';

$query = "SELECT `image_path` FROM `smt_db`.`images` WHERE id_product = " . $id . " LIMIT 4";
$db->run($query);

$db->row();
$picgen = '../prod_img/' . $db->data["image_path"];
$db->row();
$pic1 = '../prod_img/' . $db->data["image_path"];
$db->row();
$pic2 = '../prod_img/' . $db->data["image_path"];
$db->row();
$pic3 = '../prod_img/' . $db->data["image_path"];
		
unset($db);

include_once ($_SERVER[DOCUMENT_ROOT]."/com/product_view.php");
//----------|Page Footer|----------
include_once ($_SERVER[DOCUMENT_ROOT]."/com/footer.php");
//----------|Functions|----------
?>