<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");


//----------|Page Head|----------
$page_title = "СМТ - сайт цифровой техники";
$page_styles = 	css_link('../css/main.css');
$page_styles .= css_link('../css/catalog.css');
$page_scripts =  js_link('../js/jquery-3.4.1.min.js');
$page_scripts .= js_link('catalog.js');
$cart_price = 0;

include_once ($_SERVER[DOCUMENT_ROOT]."/com/doc_head.php");
include_once ($_SERVER[DOCUMENT_ROOT]."/com/header.php");
//----------|Page Content|----------
$cat = (!isset($_GET["cat"])) ? 1 : $_GET["cat"];
$pcount = (!isset($_GET["pcount"])) ? 0 : $_GET["pcount"];
$sort = (!isset($_GET["sort"])) ? 'asc' : $_GET["sort"];
$catalog_name = get_category($cat);

include_once ($_SERVER[DOCUMENT_ROOT]."/com/catalog_top.php");
generate_products_list($cat, $pcount, $sort);
include_once ($_SERVER[DOCUMENT_ROOT]."/com/catalog_bottom.php");
//----------|Page Footer|----------
include_once ($_SERVER[DOCUMENT_ROOT]."/com/footer.php");

//----------|Functions|----------
function generate_products_list($cat_id, $page_div, $sort) {
	$db = new MyDB;
	$db->connect();
	$query = "SELECT `id`, `name`, `id_category`, `price` FROM `smt_db`.`products` WHERE id_category = " . $cat_id . " ORDER BY `price`" . $sort . " LIMIT 16 OFFSET " . $page_div*16;
	$db->run($query);
	$rows = mysqli_num_rows($db->result);
	if ($rows != 0)
	{
		for ($i=0; $i < $rows; $i++) { 

			$db->row();
			$prod_id = $db->data["id"];
			$prod_name = $db->data["name"];
			$prod_category = $db->data["id_category"];
			$prod_price = $db->data["price"];
			$image_query = "SELECT `image_path` FROM `smt_db`.`images` WHERE id_product = ";
			$image_query_res = mysqli_query($db->link, $image_query . $prod_id) or die(mysqli_error($db->link));
			$image_row = mysqli_fetch_row($image_query_res);
			$prod_img = "../prod_img/" . $image_row[0];
			
			include($_SERVER[DOCUMENT_ROOT]."/com/prod_card.php");
		}
	}
	else {
		echo '<div style="font-family: Roboto; font-size: 20px; margin: 20px;">Категория пуста</div>';
	}
	unset($db);
}

function get_category($cat_id) {
	$db = new MyDB;
	$db->connect();
	$query = "SELECT `name` FROM `smt_db`.`categories` WHERE id = {$cat_id}";
	$db->run($query);
	$db->row();
	return $db->data["name"];
	unset($db);
	
}
?>