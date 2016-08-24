﻿<?php
require_once '../libs/Smarty.class.php';
require_once "./classes/users.php";
require_once "./classes/auth.php";
include_once "./classes/groups.php";
include_once "./classes/lists.php";
include_once "./classes/vk.php";
include_once "./classes/search.php";

$smarty = new Smarty;
$user = new Users();

$smarty->debugging = false;
$smarty->caching = false;

if (isset($_POST['action']) && $_POST['action'] == 'load') {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
	$headers = array( 'Expect:','Connection: Keep-Alive','Accept-Charset: utf-8,windows-1251;q=0.7,*;q=0.7' );
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_URL, $_POST['url']);

	$rss_str = curl_exec($ch);
	if(!$rss_str) {
		print "Oooops. Can't get rss stream.\n";
		exit;
	}

	$rss = simplexml_load_string($rss_str, 'SimpleXMLElement', LIBXML_NOCDATA);
	$user->ClearRSS();
	foreach ($rss->channel->item as $item) {
		$user->UpdateRSS($item->title, $item->link, substr($item->description, strpos($item->description, '&gt;')), $item->pubDate);
		//print $item->link." (".$item->pubDate.")\n".$item->title."\n".$item->description."\n-----\n";
	}
	
	return;
}

$user->Check();

$smarty->display('rss.tpl');