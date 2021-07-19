<?php 
generate_products_list($cat, $pcount, $sort);

function generate_products_list($cat_id, $page_div, $sort) {
	$db = new MyDB;
	$db->connect();
	$query = "SELECT `id`, `name`, `id_category`, `price` FROM `smt_db`.`products`  ORDER BY `id` DESC LIMIT 6";
	$db->run($query);
	$rows = mysqli_num_rows($db->result);
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
	unset($db);
}
?>
</div>
</div>
</div>