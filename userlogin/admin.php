<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");

if (!$_SESSION['admin']) header('location:login.php');
//----------|Page Head|----------
$page_title = "СМТ - сайт цифровой техники";
$page_styles = css_link('../css/main.css');
$page_styles .= css_link('../css/homepage.css');
$page_scripts =  js_link('../js/jquery-3.4.1.min.js');
$cart_price = 0;

include_once ($_SERVER[DOCUMENT_ROOT]."/com/doc_head.php");
include_once ($_SERVER[DOCUMENT_ROOT]."/com/header.php");
//----------|Page Content|----------
include_once ($_SERVER[DOCUMENT_ROOT]."/com/admin_tpl.php");
//----------|Page Footer|----------
include_once ($_SERVER[DOCUMENT_ROOT]."/com/footer.php");
//----------|Functions|----------

?>