<?php
require '../libs/Smarty.class.php';
include_once "./classes/users.php";
include_once "./classes/lists.php";
require_once ('./classes/PHPExcel.php');

$smarty = new Smarty;
$user = new Users();


$smarty->debugging = false;
$smarty->caching = false;

$percent = $user->GetPercent();

$user->Check();

if (isset($_POST)) {
	$user->SavePercent($_POST['percent']);
}

$smarty->assign("percent", $percent);

$smarty->display('settings.tpl');