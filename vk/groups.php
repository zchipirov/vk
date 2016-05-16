<?php
require '../libs/Smarty.class.php';
include_once "./classes/users.php";
include_once "./classes/groups.php";

$smarty = new Smarty;
$user = new Users();
$group = new Groups();

$smarty->debugging = false;
$smarty->caching = false;

$user->Check();

// Добавление
if (isset($_POST['action']) && $_POST['action'] == 'save') {
	$group->Create($_POST['title'], $_POST['group_id']);
	$info .= "Группа добавлена<br>";
}
// Редактирование
if (isset($_POST['action']) && $_POST['action'] == 'update') {
	if (isset($_POST['id']) && $_POST['id'] != -1) {
		$group->Update($_POST['title'], $_POST['group_id'], $_POST['id']);
		$info .= "Группа отредактирована<br>";
	}
}
// Открыть на Редактирование/Добавление
if (isset($_POST['action']) && ($_POST['action'] == 'add' || $_POST['action'] == 'edit')) {
	$smarty->assign("action", $_POST['action']);
	if ($_POST['action'] == 'add' || $_POST['action'] == 'edit') {
		if (isset($_POST['ch'][0]) && $_POST['action'] != 'add') {
			$smarty->assign("group", $group->GetGroupById($_POST['ch'][0]));
		}
		elseif($_POST['action'] != 'add')
			$err .= "Не выбрана группа для редактирования<br>";
		if (!isset($err)) {
			$smarty->display('newgroup.tpl');
			exit();
		}
	}
}
// Удаление
if (isset($_POST['action']) && $_POST['action'] == 'del') {
	if (isset($_POST['ch'][0])) {
		$group->Remove($_POST['ch'][0]);
		$info .= "Группа удалена<br>";
	}
	else
		$err .= "Не выбрана группа для удаления<br>";	
}

$groups = $group->Select();
$smarty->assign("groups", $groups);

$smarty->assign("info", $info);
$smarty->assign("errors", $err);
$smarty->display('groups.tpl');