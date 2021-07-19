<?php session_start();
//----------|Using|----------
define("INDEX", "");
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

$user = $_SESSION['userid'];

$db = new MyDB;
$db->connect();


//do 1 - del, 2 - dec, 3 - inc

switch ($_POST['do']) {
 	case 1:
 		$q = "DELETE FROM `smt_db`.`cart` WHERE `id_product` = {$_POST['id']} && `id_user` = {$user}";
 		break;
  	case 2:
 		$q = "UPDATE `smt_db`.`cart` SET `count` = `count` - 1 WHERE `id_product` = {$_POST['id']} && `id_user` = {$user}";
 		break;
  	case 3:
 		$q = "UPDATE `smt_db`.`cart` SET `count` = `count` + 1 WHERE `id_product` = {$_POST['id']} && `id_user` = {$user}";
 		break;
 	default: break;
 } 

$db->run($q);
$arr = array('totalPrice' => getTotalPrice($user), 'totalCount' => getTotalCount($user));
echo json_encode($arr);
unset($db);
?>