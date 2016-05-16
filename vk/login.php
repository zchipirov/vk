<?php
require '../libs/Smarty.class.php';
require "./classes/users.php";

$smarty = new Smarty;

//$smarty->force_compile = true;
$smarty->debugging = false;
if (isset($_POST['login'])) {
	$user = new Users();
	if ($user->Login($_POST['login'], $_POST['passwd']))
		header("Location: index.php"); 
	else
		echo "Ошибка авторизации.";
}

$smarty->display('login.tpl');