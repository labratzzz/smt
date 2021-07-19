<?php session_start();
define("INDEX", "");

$db = new MyDB;
$db->connect();
$q = "SELECT * FROM `smt_db`.`manufacterers`";
$db->run($q);
$row_num = mysqli_num_rows($db->result);
for ($i=0; $i < $row_num; $i++) { 
	$db->row();
	echo "<option value = \"{$db->data['id']}\">{$db->data['name']}</option>";
}

unset($db);
?>