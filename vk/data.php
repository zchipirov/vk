﻿<?php
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
		$content = $list_id == 0? $list->GetRSS(): $list->GetContentById($list_id);
		$percent = $_POST['percent'];
		
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
				
				$search_result = $list_id == 0? $vk->Search2($content, $title): $vk->Search($content, $title);
				
				if ((float)$search_result[0] >= $percent) {
					switch ($source) {
						case 'audio':
							$result[] = array(
								'user_id' 	=> $user_id,
								'owner_id' 	=> $item[$i]->owner_id,
								'title' 	=> $item[$i]->title,
								'duration' 	=> $item[$i]->duration,
								'url' 		=> $item[$i]->url,
								'percent'	=> round($search_result[0]),
								'extr'		=> $search_result[1],
								'link'		=> $search_result[2]
							);
							break;
						case 'video':
							$result[] = array(
								'user_id'	=> $user_id,
								'owner_id'	=> $item[$i]->owner_id,
								'title'		=> $item[$i]->title,
								'duration' 	=> $item[$i]->duration,
								'player' 	=> $item[$i]->player,
								'percent'	=> round($search_result[0]),
								'extr'		=> $search_result[1],
								'link'		=> $search_result[2]
							);
							break;
						case 'docs':
							$result[] = array(
								'user_id'	=> $user_id,
								'owner_id'	=> $item[$i]->owner_id,
								'title'		=> $item[$i]->title,
								'size'		=> $item[$i]->size,
								'url'		=> $item[$i]->url,
								'extr'		=> $search_result[1],
								'link'		=> $search_result[2]
							);
							break;
						case 'groups':
							$result[] = array(
								'user_id'	=> $user_id,
								'owner_id'	=> $item[$i]->user_id,
								'name'		=> $item[$i]->name,
								'extr'		=> $search_result[1],
								'link'		=> $search_result[2]
							);
							break;
						case 'friends':
							$result[] = array(
								'user_id'	=> $user_id,
								'owner_id'	=> $item[$i]->user_id,
								'first_name'=> $item[$i]->first_name,
								'last_name'	=> $item[$i]->last_name,
								'extr'		=> $search_result[1],
								'link'		=> $search_result[2]
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












