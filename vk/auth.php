<?php
require_once '../libs/Smarty.class.php';
require_once "./classes/auth.php";
require_once "./classes/auth.php";

$smarty = new Smarty;
$user = new Users();
$auth = new AuthController();

$smarty->caching = false;
if (isset($_GET['code']))
	$auth->GetToken($_GET);
if (isset($_GET['logout']) && $_GET['logout'] == 1)
	$user->Logout();