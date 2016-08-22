<?php
include_once("safemysql.php");
class Lists {
	public function Create($title) {
		$db = new SafeMySQL();
		$db->query("INSERT INTO lists (title, user_id, dt) VALUES (?s, ?i, now())", $title, $_COOKIE['id']);
	}
	public function Select() {
		$db = new SafeMySQL();
		$lists = $db->getAll("SELECT id, title, (SELECT user_login FROM users AS u WHERE u.user_id=ls.user_id) AS user_id, dt FROM lists AS ls");
		return $lists;
	}
	public function Update($title, $id) {
		$db = new SafeMySQL();
		$db->query("UPDATE lists SET title=?s, user_id=?i WHERE id=?i", $title, $_COOKIE['id'], $id);
	}
	public function Remove($id) {
		$db = new SafeMySQL();
		$db->query("DELETE FROM lists WHERE id=?i", $id);
		$db->query("DELETE FROM list_content WHERE list_id=?i", $id);
	}
	public function GetListById($id) {
		$db = new SafeMySQL();
		$lists = $db->getAll("SELECT id, title FROM lists WHERE id=?i LIMIT 1", $id);
		return $lists[0];
	}
	public function GetListByTitle($title) {
		$db = new SafeMySQL();
		$lists = $db->getAll("SELECT id FROM lists WHERE title=?s LIMIT 1", $title);
		return $lists[0];
	}
	public function GetContentById($id) {
		$db = new SafeMySQL();
		$lists = $db->getAll("SELECT id, caption, title, note FROM list_content WHERE list_id=?i", $id);
		return $lists;
	}
	public function RemoveContentById($id) {
		$db = new SafeMySQL();
		$db->query("DELETE FROM list_content WHERE id=?i", $id);
	}
	public function InsertContent($id, $title, $caption, $note) {
		$db = new SafeMySQL();
		$db->query("INSERT INTO list_content (list_id, caption, title, note) VALUES (?i, ?s, ?s, ?s)", $id, $caption, $title, $note);
	}
}
?>