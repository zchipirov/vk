<?php
require '../libs/Smarty.class.php';
include_once "./classes/users.php";
include_once "./classes/lists.php";
require_once ('./classes/PHPExcel.php');

$smarty = new Smarty;
$user = new Users();
$list = new Lists();

$smarty->debugging = false;
$smarty->caching = false;

$user->Check();

if (isset($_POST['action']) && $_POST['action'] == 'load') {
	$uploaddir = 'uploads/';
	
	$files = glob($uploaddir."*");
    $c = count($files);
	foreach ($files as $file) {      
		if (file_exists($file)) {
			unlink($file);
		}   
	}
	
	$file = $uploaddir . basename($_FILES['f']['name']);
	
	if (!move_uploaded_file($_FILES['f']['tmp_name'], $file)) {
		echo "ошибка загрузки файла...\n";
	}
	
	$Reader = PHPExcel_IOFactory::createReaderForFile($file);
	$Reader->setReadDataOnly(true);
	$objXLS = $Reader->load($file);
	$i = 1;
	$id = $_POST['id'];
	do {
		$index = $objXLS->getSheet(0)->getCell('A'.$i)->getValue();
		
		$value_B = $objXLS->getSheet(0)->getCell('B'.$i)->getValue();
		$value_C = $objXLS->getSheet(0)->getCell('C'.$i)->getValue();
		$value_D = $objXLS->getSheet(0)->getCell('D'.$i)->getValue();
		$i+=1;
		$list->InsertContent($id, $value_B, $value_C, $value_D);
	}while($index != "");
}

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
if (isset($_POST['action']) && ($_POST['action'] == 'add_c' || $_POST['action'] == 'add_c2')) {
	if ($_POST['action'] == 'add_c') {
		$smarty->assign("list", $_POST['id']);
		$smarty->display('newellist.tpl');
		exit();
	}
	if ($_POST['action'] == 'add_c2')
	{
		$list->InsertContent($_POST['id'], $_POST['title'], "", "");
		return;
		exit();
	}
	else
		$err .= "Не выбран элемент списока для удаления<br>";	
}
if (isset($_POST['action']) && $_POST['action'] == 'del_c') {
	if (isset($_POST['lc'][0])) {
		$list->RemoveContentById($_POST['lc'][0]);
		$info .= "Элемент списка удален<br>";
	}
	else
		$err .= "Не выбран элемент списока для удаления<br>";	
}

$list = $list->Select();
$smarty->assign("lists", $list);

$smarty->assign("info", $info);
$smarty->assign("errors", $err);
$smarty->display('lists.tpl');