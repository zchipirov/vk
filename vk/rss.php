<?php
require_once '../libs/Smarty.class.php';
require_once "./classes/users.php";
require_once "./classes/auth.php";
include_once "./classes/groups.php";
include_once "./classes/lists.php";
include_once "./classes/vk.php";
include_once "./classes/search.php";

$smarty = new Smarty;
$user = new Users();

$smarty->debugging = false;
$smarty->caching = false;

if (isset($_POST['action']) && $_POST['action'] == 'load') {
	$group_name = $group->GetGroupById($_POST['rb'][0]);
	$list_id = $_POST['ls'][0];
	$list_title = $list->GetListById($list_id);
	$vk = new VK();
	//$group_data = $vk->GetInfoGroup($group_name['group_id']);
	//$count = $group_data['response'][0]['members_count'];
	//----====================================================-----
	$smarty->assign("list_id", $list_id);
	$smarty->assign("list_title", $list_title['title']);
	$smarty->assign("group_id", $group_name['group_id']);
	$smarty->assign("group_title", $group_name['title']);
	//$smarty->assign("group_count", $count);
	if (isset($_POST['inf']) && $_POST['inf'] == '1') {
		$smarty->assign("source", "audio");
	}
	if (isset($_POST['inf']) && $_POST['inf'] == '2') {
		$smarty->assign("source", "video");
	}
	if (isset($_POST['inf']) && $_POST['inf'] == '3') {
		$smarty->assign("source", "docs");
	}
	if (isset($_POST['inf']) && $_POST['inf'] == '5') {
		$smarty->assign("source", "groups");
	}
	if (isset($_POST['inf']) && $_POST['inf'] == '4') {
		$smarty->assign("source", "friends");
	}
	$smarty->assign("percent", $user->GetPercent());
	$smarty->display('result.tpl');
	return;
}

$user->Check();

$smarty->display('rss.tpl');