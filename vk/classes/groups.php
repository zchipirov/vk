<?php
include_once("safemysql.php");
class Groups {
	public function Create($title, $group_id) {
		$db = new SafeMySQL();
		$db->query("INSERT INTO groups (title, group_id, user_id, dt) VALUES (?s, ?s, ?i, now())", $title, $group_id, $_COOKIE['id']);
	}
	public function Select() {
		$db = new SafeMySQL();
		$groups = $db->getAll("SELECT id, title, group_id, (SELECT user_login FROM users AS u WHERE u.user_id=gr.user_id) AS u_id, dt FROM groups AS gr");
		return $groups;
	}
	public function Update($title, $group_id, $id) {
		$db = new SafeMySQL();
		$db->query("UPDATE groups SET title=?s, group_id=?s, user_id=?i WHERE id=?i", $title, $group_id, $_COOKIE['id'], $id);
	}
	public function Remove($id) {
		$db = new SafeMySQL();
		$db->query("DELETE FROM groups WHERE id=?i", $id);
	}
	public function GetGroupById($id) {
		$db = new SafeMySQL();
		$groups = $db->getAll("SELECT id, title, group_id FROM groups WHERE id=?i LIMIT 1", $id);
		return $groups[0];
	}
}
?>