<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

// MYSQL
class MyDB 
{
private $dbuser = "root";
private $dbpass = "[1333haloeemesix]";
private $db = "smt_db";
private $dbhost="127.0.0.1";

public $link;
public $query;
public $err;
public $result;
public $data;
public $fetch;

function connect() {
$this->link = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->db); 
mysqli_query($this->link, 'SET NAMES utf8');
}

function close() {
mysqli_close($this->link);
}

function run($query) {
$this->query = $query;
$this->result = mysqli_query($this->link, $this->query);
$this->err = mysqli_error($this->link);
}
function row() {
$this->data = mysqli_fetch_assoc($this->result);
}
function fetch() {
while ($this->data = mysqli_fetch_assoc($this->result)) {
$this->fetch = $this->data;
return $this->fetch;
}
}
function stop() {
unset($this->data);
unset($this->result);
unset($this->fetch);
unset($this->err);
unset($this->query);
}
}

function css_link($path) {
	return "<link href = \"{$path}\" rel = \"stylesheet\" type = \"text/css\">";
}

function js_link($path) {
	return "<script type=\"text/javascript\" src = \"{$path}\"></script>";
}

function select_one_item($link, $param_name, $table_name, $id_name, $id) {
	if (!$id) $id = 1;
	$query = "SELECT {$param_name} FROM {$table_name} WHERE {$id_name} = {$id}";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$value = mysqli_fetch_row($result);
	return $value[0];
}

function getTotalPrice($id_user) {
	$db = new MyDB;
	$db->connect();
	$q = "SELECT `price`, `count` FROM `smt_db`.`cart` AS c INNER JOIN `smt_db`.`products` AS p ON c.`id_product` = p.`id` WHERE `id_user` = {$id_user}";
	$db->run($q); $sum = 0;
	$row_num = mysqli_num_rows($db->result);
	for ($i=0; $i < $row_num; $i++) { 
		$db->row();
		$sum += $db->data['price'] * $db->data['count'];
	}
	unset($db);
	return $sum;
}

function getTotalCount($id_user) {
		$db = new MyDB;
	$db->connect();
	$q = "SELECT `price`, `count` FROM `smt_db`.`cart` AS c INNER JOIN `smt_db`.`products` AS p ON c.`id_product` = p.`id` WHERE `id_user` = {$id_user}";
	$db->run($q); $sum = 0;
	$row_num = mysqli_num_rows($db->result);
	for ($i=0; $i < $row_num; $i++) { 
		$db->row();
		$sum += $db->data['count'];
	}
	unset($db);
	return $sum;
}

function getCount($id_user, $id_product) {
		$db = new MyDB;
	$db->connect();
	$q = "SELECT `count` FROM `smt_db`.`cart` AS c INNER JOIN `smt_db`.`products` AS p ON c.`id_product` = p.`id` WHERE `id_user` = {$id_user} $$ `id_product` = {$id_product}";
	$db->run($q);
	$db->row();
	$count = $db->data['count'];
	unset($db);
	return $count;
}

function getPrice($id_user, $id_product) {
		$db = new MyDB;
	$db->connect();
	$q = "SELECT `price`, `count` FROM `smt_db`.`cart` AS c INNER JOIN `smt_db`.`products` AS p ON c.`id_product` = p.`id` WHERE `id_user` = {$id_user} $$ `id_product` = {$id_product}";
	$db->run($q);
	$price = $db->data['count'] * $db->data['price'];
	unset($db);
	return $price;
}