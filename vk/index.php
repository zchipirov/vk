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
	
	//$access_token = $user->GetAccess_token();
	$group_name = $group->GetGroupById($_POST['rb'][0]);
	$list_id = $_POST['ls'][0];
	$vk = new VK();
	//$group_data = $vk->GetInfoGroup($group_name['group_id']);
	//----====================================================-----
	$smarty->assign("list_id", $list_id);
	$smarty->assign("group_id", $group_name['group_id']);
	
	$smarty->display('result.tpl');
	return;
	//----====================================================-----
	$count = $group_data['response'][0]['members_count'];
	$content = $list->GetContentById($list_id);
	for ($offset = 0; $offset <= $count; $offset += 1000) {
		$data = $vk->GetUsers($offset, $group_name['group_id']);
		
		for ($i = 0; $i < count($data['response']['items']); $i++) {
			$userid = $data['response']['items'][$i];
			
			if (isset($_POST['inf']) && $_POST['inf'] == '1') {
				
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
				if ($j % 1000 == 0)
					Sleep(500);
			}
			if (isset($_POST['inf']) && $_POST['inf'] == '2') {
				
				$video = $vk->GetUser_Video($userid, $access_token);
				for ($j = 0; $j < count($video['response']['items']); $j++) {
					$record = $video['response']['items'][$j];
					if ($vk->Search($content[0], $record['title']) >= 15) {
						$video_[] = array(
							'user_id' => $record['owner_id'],
							'title' => $record['title'],
							'duration' => $record['duration'],
							'player' => $record['player']
						);
					}
				}
				/*if ($i % 3 == 0)
					Sleep(100);*/
				break;
			}
			if (isset($_POST['inf']) && $_POST['inf'] == '3') {
				$docs_ = array();
				$docs = $vk->GetUser_Docs($userid, $access_token);
				for ($j = 0; $j < count($docs['response']['items']); $j++) {
					$record = $docs['response']['items'][$j];
					if ($vk->Search($content[0], $record['title']) >= 15) {
						$docs_[] = array(
							'user_id' => $record['owner_id'],
							'title' => $record['title'],
							'size' => $record['size'],
							'url' => $record['url']
						);
					}
					if ($j % 1000 == 0) {
						Sleep(1500);
					}
					/*echo "id: ".$record['owner_id'].'<br>';
					echo "title: ".$record['title'].'<br>';
					echo "MAX: ".$vk->Search($content[0], $record['title'])."%".'<br>';
					echo "size: ".$record['size'].'<br>';
					echo "url: ".$record['url'].'<br>';
					echo "<br>";*/
				}
			}
			if (isset($_POST['inf']) && $_POST['inf'] == '4') {
				$friends_ = array();
				$friends = $vk->GetUser_Friends($userid, $access_token);
				for ($j = 0; $j < count($friends['response']['items']); $j++) {
					$record = $friends['response']['items'][$j];
					if ($vk->Search($content[0], $record['first_name']." ".$record['last_name']) >= 15) {
						$friends_[] = array(
							'user_id' => $record['user_id'],
							'first_name' => $record['first_name'],
							'last_name' => $record['last_name']
						);
					}
					if ($j % 1000 == 0) {
						Sleep(1500);
					}
					/*echo "id: ".$record['user_id'].'<br>';
					echo "first_name: ".$record['first_name'].'<br>';
					echo "last_name: ".$record['last_name'].'<br>';
					echo "MAX: ".$vk->Search($content[0], $record['first_name']." ".$record['last_name'])."%".'<br>';
					echo "<br>";*/
				}
			}
			if (isset($_POST['inf']) && $_POST['inf'] == '5') {
				$groups_ = array();
				$groups = $vk->GetUser_Groups($userid, $access_token);
				for ($j = 0; $j < count($groups['response']['items']); $j++) {
					$record = $groups['response']['items'][$j];
					if ($vk->Search($content[0], $record['name']) >= 15) {
						$groups_[] = array(
							'user_id' => $record['user_id'],
							'name' => $record['name']
						);
					}
					if ($j % 1000 == 0) {
						Sleep(1500);
					}
					/*echo "id: ".$record['user_id'].'<br>';
					echo "name: ".$record['name'].'<br>';
					echo "MAX: ".$vk->Search($content[0], $record['name'])."%".'<br>';
					echo "<br>";*/
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