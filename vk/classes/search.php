<?php
class Search {
	public function SearchAudio($records, $list_id) {
		for ($j = 0; $j < count($records['response']['items']); $j++) {
			$record = $records['response']['items'][$j];
			echo "id: ".$record['owner_id'].'<br>';
			echo "title: ".$record['title'].'<br>';
			echo "duration: ".$record['duration'].'<br>';
			echo "url: ".$record['title'].'<br>';
			echo "album_id: ".$record['title'].'<br>';
			echo "<br>";
		}
	}
}
?>