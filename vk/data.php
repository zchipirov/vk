<?php
require_once '../libs/Smarty.class.php';
require_once "./classes/users.php";
require_once "./classes/auth.php";
include_once "./classes/groups.php";
include_once "./classes/lists.php";
include_once "./classes/vk.php";
include_once "./classes/search.php";

$smarty 	= new Smarty;
$user 		= new Users();
$group 		= new Groups();
$list 		= new Lists();
$vk 		= new VK();

//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
//$smarty->cache_lifetime = 120;

if (isset($_POST['action']) && $_POST['action'] == 'search') {
	ini_set('max_execution_time', 3600000);
	if (isset($_POST['source'])) {
		$source = $_POST['source'];
		$data = json_decode($_POST['data']);
		$list_id = $_POST['list_id'];
		$user_id = $_POST['user_id'];
		$content = $list->GetContentById($list_id);
		
		foreach($data as $key => $item) { 
			for ($i = 0; $i < count($item); $i++) {
				$title = "";
				switch ($source) {
					case 'friends':
						$title = $item[$i]->first_name." ".$item[$i]->last_name;
						break;
					case 'groups':
						$title = $item[$i]->name;
						break;
					default:
						$title = $item[$i]->title;
				}
				$search_result = $vk->Search($content, $title);
				if ($search_result >= 15) {
					switch ($source) {
						case 'audio':
							$result[] = array(
								'user_id' 	=> $user_id,
								'owner_id' 	=> $item[$i]->owner_id,
								'title' 	=> $item[$i]->title,
								'duration' 	=> $item[$i]->duration,
								'url' 		=> $item[$i]->url
							);
							break;
						case 'video':
							$result[] = array(
								'user_id' 	=> $user_id,
								'owner_id' => $record['owner_id'],
								'title' => $record['title'],
								'duration' => $record['duration'],
								'player' => $record['player']
							);
							break;
						case 'docs':
							$result[] = array(
								'user_id' 	=> $user_id,
								'owner_id' => $record['owner_id'],
								'title' => $record['title'],
								'size' => $record['size'],
								'url' => $record['url']
							);
							break;
						case 'groups':
							$result[] = array(
								'user_id' 	=> $user_id,
								'owner_id' => $record['user_id'],
								'name' => $record['name']
							);
							break;
						case 'groups':
							$result[] = array(
								'user_id' 	=> $user_id,
								'owner_id' => $record['user_id'],
								'first_name' => $record['first_name'],
								'last_name' => $record['last_name']
							);
							break;
					}
				}
			}
		}
		ini_set('max_execution_time', 600);
		echo json_encode($result);
	}
}












