<?php
require_once "../libs/Smarty.class.php";
require_once "./classes/users.php";
require_once "./classes/lists.php";
require_once "./classes/PHPExcel.php";

$smarty = new Smarty;
$users = new Users();
$list = new Lists();

$smarty->debugging = false;
$smarty->caching = false;

$users->Check();

// Добавление
if (isset($_POST['action']) && $_POST['action'] == 'save') {
	$list->Create($_POST['title']);
	$info .= "Список добавлен<br>";
}

// Открыть на Редактирование/Добавление/Открытие
if (isset($_POST['action']) && ($_POST['action'] == 'add')) {
	$smarty->assign("action", $_POST['action']);
	$smarty->display('newusers.tpl');
	exit();
}

$user = $users->Select();
$smarty->assign("users", $user);

$smarty->assign("info", $info);
$smarty->assign("errors", $err);
$smarty->display('users2.tpl');