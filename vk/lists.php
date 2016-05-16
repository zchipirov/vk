<?php
require '../libs/Smarty.class.php';
include_once "./classes/users.php";
include_once "./classes/lists.php";
require_once ('./classes/PHPExcel/IOFactory.php');

$smarty = new Smarty;
$user = new Users();
$list = new Lists();

$smarty->debugging = false;
$smarty->caching = false;

$user->Check();

// Добавление
if (isset($_POST['action']) && $_POST['action'] == 'save') {
	$list->Create($_POST['title']);
	$info .= "Список добавлен<br>";
}
// Редактирование
if (isset($_POST['action']) && $_POST['action'] == 'update') {
	if (isset($_POST['id']) && $_POST['id'] != -1) {
		$list->Update($_POST['title'], $_POST['id']);
		$info .= "Список отредактирован<br>";
	}
}
// Открыть на Редактирование/Добавление/Открытие
if (isset($_POST['action']) && ($_POST['action'] == 'add' || $_POST['action'] == 'edit' || $_POST['action'] == 'open')) {
	$smarty->assign("action", $_POST['action']);
	if ($_POST['action'] == 'open'){
		if (isset($_POST['rb'][0])) {
			$list_content = $list->GetContentById($_POST['rb'][0]);
			$smarty->assign("list_content", $list_content);
			$smarty->assign("list", $list->GetListById($_POST['rb'][0]));
			$smarty->display('filllist.tpl');
			exit();
		}
	}
	if ($_POST['action'] == 'add' || $_POST['action'] == 'edit') {
		if (isset($_POST['rb'][0])) {
			$smarty->assign("list", $list->GetListById($_POST['rb'][0]));
		}
		elseif($_POST['action'] != 'add')
			$err .= "Не выбран список для редактирования<br>";
		if (!isset($err)) {
			$smarty->display('newlist.tpl');
			exit();
		}
	}
}
// Удаление
if (isset($_POST['action']) && $_POST['action'] == 'del') {
	if (isset($_POST['rb'][0])) {
		$list->Remove($_POST['rb'][0]);
		$info .= "Список удален<br>";
	}
	else
		$err .= "Не выбран список для удаления<br>";	
}

$list = $list->Select();
$smarty->assign("lists", $list);

$smarty->assign("info", $info);
$smarty->assign("errors", $err);
$smarty->display('lists.tpl');