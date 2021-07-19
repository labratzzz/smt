<?php session_start();
define("INDEX", "");
//----------|Using|----------
require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");



$page_title = "СМТ - сайт цифровой техники";
$cart_price = 0;

$page_styles = 	css_link('../css/main.css');
$page_styles .= css_link('../css/catalog.css');
$page_scripts =  js_link('../js/jquery-3.4.1.min.js');
$page_scripts .= js_link('catalog.js');


?>