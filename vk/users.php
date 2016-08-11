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
if (isset($_POST['action']) && ($_POST['action'] == 'add' || $_POST['action'] == 'edit' || $_POST['action'] == 'open')) {
	$smarty->assign("action", $_POST['action']);
	if ($_POST['action'] == 'open'){
		if (isset($_POST['rb'][0])) {
			$list_content = $list->GetContentById($_POST['rb'][0]);
			$smarty->assign("list_content", $list_content);
			$smarty->assign("id", $_POST['rb'][0]);
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
if (isset($_POST['action']) && $_POST['action'] == 'del_c') {
	if (isset($_POST['lc'][0])) {
		$list->RemoveContentById($_POST['lc'][0]);
		$info .= "Элемент списка удален<br>";
	}
	else
		$err .= "Не выбран элемент списока для удаления<br>";	
}

$user = $users->Select();
$smarty->assign("users", $user);

$smarty->assign("info", $info);
$smarty->assign("errors", $err);
$smarty->display('users.tpl');