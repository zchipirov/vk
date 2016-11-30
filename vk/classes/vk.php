<?php
class VK {
	private $url = 'https://api.vk.com/method/';
	private $v = "v=5.52";
	
	public function GetUsers($offset, $group_id) {
		$params = array(
				'group_id' => $group_id,
				'offset' => $offset
			);		
		
		return $this->getdata("groups.getMembers?", $params);
	}
	
	public function GetInfoGroup($group_id) {
		$params = array(
				'group_id' => $group_id,
				'fields' => 'members_count'
			);		
		
		return $this->getdata("groups.getById?", $params);
	}
	
	public function GetUser_Audio($userid, $access_token) {
		$params = array(
			'owner_id' => $userid,
			'count' => '6000',
			'access_token' => $access_token
		);
		
		return $this->getdata("audio.get?", $params);
	}
	
	public function GetUser_Friends($userid, $access_token) {
		$params = array(
			'user_id' => $userid,
			'count' => '6000',
			'fields' => 'domain',
			'access_token' => $access_token
		);
		
		return $this->getdata("friends.get?", $params);
	}
	
	public function GetUser_Groups($userid, $access_token) {
		$params = array(
			'user_id' => $userid,
			'count' => '1000',
			'extended' => '1',
			'access_token' => $access_token
		);
		
		return $this->getdata("groups.get?", $params);
	}
	
	public function GetUser_Docs($userid, $access_token) {
		$params = array(
			'owner_id' => $userid,
			'count' => '6000',
			'access_token' => $access_token
		);
		
		return $this->getdata("docs.get?", $params);
	}
	
	public function GetUser_Video($userid, $access_token) {
		$params = array(
			'owner_id' => $userid,
			'count' => '200',
			'access_token' => $access_token
		);
		
		return $this->getdata("video.get?", $params);
	}
	
	private function getdata($body, $params) {
		$urls = $this->url.$body.$this->v.'&'.urldecode(http_build_query($params));
		$data = json_decode(file_get_contents($urls), true);
		return $data;
	}
	
	public function Search($content, $title) {
		$title = explode(" ", trim($title));
		$title2 = "";
		$max = -1;
		for ($i = 0; $i < count($content); $i++) {
			$cn = explode(" ", trim($content[$i]['title']));
			$pr = 0;
			$val = 0;
			for ($j = 0; $j < count($title); $j++) {
				for ($k = 0; $k < count($cn); $k++) {
					if ($cn[$k] != NULL && strlen($title[$j]) > 2 && strlen($cn[$k]) > 2 && 
						$title[$j] == $cn[$k]) {
						$pr += 1;
						continue;
					}
				}
			}
			if ($this->CountT($title) <= $this->CountT($cn)) {
				$val = $pr * 100 / $this->CountT($cn);
			}
			else
				$val = $pr * 100 / $this->CountT($title);
			if ($val > $max) {
				$max = $val;
				$title2 = $content[$i]['title'];
			}
		}
		//echo "MAX=$max<br>";
		return array(0=>$max, 1=>$title2);
	}
	public function Search2($content, $title) {
		$chars = array(".", ",", ":", "|", ")", "(", "-", "=", "*", "/", "!", "@", "#", "%", "&", "+", "«", "»");
		$title = str_replace($chars, "", $title);
		$title = explode(" ", trim($title));
		$max = -1;
		$title2 = "";
		$val = 0;
		$link = "";
		
		for ($i = 0; $i < count($content); $i++) {
			$content[$i]['descr'] = substr($content[$i]['descr'], strpos($content[$i]['descr'], '«') + 1, strpos($content[$i]['descr'], '»') - (strpos($content[$i]['descr'], '«') + 1));
			$content[$i]['descr'] = str_replace($chars, "", $content[$i]['descr']);
			
			$cn = explode(" ", trim($content[$i]['descr']));
			$pr = 0;
			for ($j = 0; $j < count($title); $j++) {
				for ($k = 0; $k < count($cn); $k++) {
					if ($cn[$k] != NULL && strlen($title[$j]) > 2 && strlen($cn[$k]) > 2 && $title[$j] == $cn[$k]) {
						$pr += 1;
						continue;
					}
				}
			}
			if ($this->CountT($title) <= $this->CountT($cn))
				$val = $pr * 100 / $this->CountT($cn);
			else
				$val = $pr * 100 / $this->CountT($title);
			if ($val > $max) {
				$max = $val;
				$title2 = $content[$i]['title'];
				$link  = $content[$i]['link'];
			}
		}
		//echo "MAX=$max<br>";
		return array(0=>$max, 1=>$title2, 2=>$link);
	}
	public function CountT($arr) {
		$j = 0;
		for ($i=0; $i < count($arr); $i++) {
			if (strlen($arr[$i]) > 2)
				$j += 1;
		}
		return $j == 0? 1: $j;
	}
}
?>