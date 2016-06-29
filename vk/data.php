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
		//var_dump($_POST['audio']);
		$audio = json_decode($_POST['audio']);
		sleep(5000);
		var_dump($audio);
	}
	/*for ($i = 0; $i < count($data['response']['items']); $i++) {
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
	}*/
}