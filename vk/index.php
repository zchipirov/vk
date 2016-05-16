<?php
require_once '../libs/Smarty.class.php';
require_once "./classes/users.php";
require_once "./classes/auth.php";
include_once "./classes/groups.php";
include_once "./classes/lists.php";
include_once "./classes/vk.php";

$smarty = new Smarty;
$user = new Users();
$group = new Groups();
$list = new Lists();

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
//$smarty->cache_lifetime = 120;

if (isset($_POST['action']) && $_POST['action'] == 'search') {
	$vk = new VK();
	for ($offset = 0; $offset < 10000;$offset+=1000) {
		$vk->GetUsers($offset);
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
	}
	
	return;
}

$user->Check();
$access_token = $user->GetAccess_token();

$auth = new AuthController();

$list = $list->Select();
$smarty->assign("lists", $list);

$groups = $group->Select();
$smarty->assign("groups", $groups);

if ($auth->VK_Auth($access_token))
	$smarty->display('index.tpl');