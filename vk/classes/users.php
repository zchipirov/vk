<?php
include_once("safemysql.php");
class Users {
	public function Create($login, $passwd) {
		$db = new SafeMySQL();
		$err = array();
		if(!preg_match("/^[a-zA-Z0-9]+$/", $login))
			$err[] = "Логин может состоять только из букв английского алфавита и цифр";
		if(strlen($login) < 3 or strlen($login) > 30)
			$err[] = "Логин должен быть в диапазоне от трёх до тридцати симвалов.";
		$query = $db->getOne("SELECT COUNT(user_id) FROM users WHERE user_login=".$db->escapeString($login));
		if($query > 0)
			$err[] = "Пользователь с таким логином уже существует в базе данных.";
		if(count($err) == 0) {
			$passwd = md5(md5(trim($passwd)));
			$db->query("INSERT INTO users SET user_login='".$login."', user_password='".$passwd."'");
			//header("Location: login.php"); exit();
		}
		else {
			print "<b>При регистрации произошли следующие ошибки:</b><br>";
			foreach($err AS $error)
				print $error."<br>";
		}
	}
	public function Check() {
		$db = new SafeMySQL();
		if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) { 
			$userdata = $db->getAll("SELECT * FROM users WHERE user_id = ?i LIMIT 1", intval($_COOKIE['id']));
			if (($userdata[0]['user_hash'] !== $_COOKIE['hash']) or ($userdata[0]['user_id'] !== $_COOKIE['id'])) {
				setcookie("id", "", time() - 3600*24*30*12, "/");
				setcookie("hash", "", time() - 3600*24*30*12, "/");
				header("Location: login.php");
				exit();
			}
			else
				return true;
		}
		header("Location: login.php");
		return false;
	}
	public function generateCode($length = 6) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;  
		while (strlen($code) < $length)
			$code .= $chars[mt_rand(0,$clen)];  
		return $code;
	}
	public function Login($login, $passwd) {
		$db = new SafeMySQL();
		$sql = "SELECT user_id, user_password FROM users WHERE user_login=".$db->escapeString($login)." LIMIT 1" ;
		$data = $db->getAll($sql);
		if($data[0]['user_password'] === md5(md5($passwd))) {
			$hash = md5($this->generateCode(10));
			$db->query("UPDATE users SET user_hash=?s WHERE user_id=?s", $hash, $data[0]['user_id']);
			setcookie("id", $data[0]['user_id'], time()+60*60*24*30);
			setcookie("hash", $hash, time()+60*60*24*30);
			return true;
		}
		else
			return false;
	}
	public function Logout() {
		$db = new SafeMySQL();
		if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
			$db->query("UPDATE users SET user_hash='', access_token='' WHERE user_id=?i", $_COOKIE['id']);
			setcookie("id", "", time() - 3600*24*30*12, "/");
			setcookie("hash", "", time() - 3600*24*30*12, "/");
			setcookie("access_token", "", time() - 3600*24*30, "/");
			header("Location: login.php");
			exit();
		}
		return false;
	}
	public function GetAccess_token() {
		$db = new SafeMySQL();
		$access_token = $db->getAll("SELECT access_token FROM users WHERE user_id = ?i LIMIT 1", intval($_COOKIE['id']));
		return $access_token[0]['access_token'];
	}
	public function UpdateAccess_token($token) {
		$db = new SafeMySQL();
		$db->query("UPDATE users SET access_token=?s WHERE user_id=?i", $token, $_COOKIE['id']);
	}
	public function GetPercent() {
		$db = new SafeMySQL();
		$pr = $db->getAll("SELECT val FROM settings LIMIT 1");
		return $pr[0]['val'];
	}
	public function SavePercent($percent) {
		$db = new SafeMySQL();
		$db->query("UPDATE settings SET val=?s", $percent);
	}
	public function Select() {
		$db = new SafeMySQL();
		$lists = $db->getAll("SELECT user_id, user_login FROM users");
		return $lists;
	}
	public function ClearRSS() {
		$db = new SafeMySQL();
		$db->query("DELETE FROM rss");
	}
	public function UpdateRSS($title, $link, $description, $pubDate) {
		$db = new SafeMySQL();
		$sql = "INSERT INTO rss (title, link, descr, dt) VALUE ('".$title."', '".$link."', ".$description.", '".$pubDate."')";
		echo "<br>".$sql."<br>";
		$db->query($sql);
	}
}
?>