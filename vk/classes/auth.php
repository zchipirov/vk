<?php
include_once("users.php");
class Auth {
	public function VK_Auth($client_id, $redirect_uri) {
		$url = 'http://oauth.vk.com/authorize';
		$params = array(
			'client_id'     => $client_id,
			'redirect_uri'  => $redirect_uri,
			'response_type' => 'code',
			'scope' 		=> 'friends,photos,audio,video,docs,notes,pages,groups,offline',
			'v'				=> '5.50',
			'display'		=> 'page'
		);
		echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через ВКонтакте</a></p>';
	}
	public function VK_Token($client_id, $client_secret, $redirect_uri, $code) {
		$params = array(
				'client_id' => $client_id,
				'client_secret' => $client_secret,
				'code' => $code,
				'redirect_uri' => $redirect_uri
			);
		$token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
		echo "token = ".$token;
		return $token;
	}
	public function GetCode() {
		if (isset($_GET['code'])) return $_GET['code'];
	}
}
class AuthController {
	public function VK_Auth($access_token) {
		if (isset($access_token) && $access_token != "")
			return true;
		$auth = new Auth();
		$auth->VK_Auth("5382063", "http://vkgrab.esy.es/vk/auth.php");
		
		return false;
	}
	public function GetToken($array) {
		if ($array['code']) {
			$auth = new Auth();
			$code = $array['code'];
			$token = $auth->VK_Token("5382063", "vpjcVYbHp1L30UHuxn3Y", "http://vkgrab.esy.es/vk/auth.php", $code);
			if (isset($token["access_token"])) {
				$user = new Users();
				$user->UpdateAccess_token($token["access_token"]);
				//header("Location: http://energy15.esy.es/vk/index.php");
			}
		}
	}
}