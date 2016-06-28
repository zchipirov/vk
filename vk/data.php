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
$group = new Groups();
$list = new Lists();

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
//$smarty->cache_lifetime = 120;

if (isset($_POST['action']) && $_POST['action'] == 'search') {
	ini_set('max_execution_time', 3600000);
	if (isset($_POST['audio'])) {
			var_dump($_POST['audio']);
			return;
	}
	return;
	for ($i = 0; $i < count($data['response']['items']); $i++) {
		$userid = $data['response']['items'][$i];
		
		if (isset($_POST['audio'])) {
			var_dump($_POST['audio']);
			return;
			$audio = $vk->GetUser_Audio($userid, $access_token);
			for ($j = 0; $j < count($audio['response']['items']); $j++) {
				$record = $audio['response']['items'][$j];
				if ($vk->Search($content[0], $record['title']) >= 15) {
					$audio_[] = array(
						'user_id' => $record['owner_id'],
						'title' => $record['title'],
						'duration' => $record['duration'],
						'url' => $record['url']
					);
				}
			}
		}
	}
	
	ini_set('max_execution_time', 30);
	if (isset($audio_) || isset($video_) || isset($docs_) || isset($groups_) || isset($friends_)) {
		if (isset($audio_)) $smarty->assign("audio_", $audio_);
		if (isset($video_)) $smarty->assign("video_", $video_);
		if (isset($docs_)) $smarty->assign("docs_", $docs_);
		if (isset($groups_)) $smarty->assign("groups_", $groups_);
		if (isset($friends_)) $smarty->assign("friends_", $friends_);
		
		$smarty->display('result.tpl');
		return;
	}
		
}

$user->Check();
//$access_token = $user->GetAccess_token();

$auth = new AuthController();

$list = $list->Select();
$smarty->assign("lists", $list);

$groups = $group->Select();
$smarty->assign("groups", $groups);
$smarty->assign("home", 1);

//if ($auth->VK_Auth($access_token))
	$smarty->display('index.tpl');