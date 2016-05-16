<?php
class VK {
	public function GetUsers($offset) {
		$params = array(
				'group_id' => 'foto.blog',
				'offset' => $offset
			);
		$token = json_decode(file_get_contents('https://api.vk.com/method/groups.getMembers?group_id=foto.blog&offset=0' . '?' . urldecode(http_build_query($params))), true);
		var_dump($token);
		return $token;
	}
}
?>