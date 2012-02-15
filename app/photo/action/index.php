<?php 
defined('IN_TS') or die('Access Denied.');
$page = isset($_GET['page']) ? $_GET['page'] : '1';

$url = SITE_URL."index.php?app=photo&ac=index&page=";

$lstart = $page*28-28;

$arrAlbum = $db->findAll("select * from ".dbprefix."photo_album where `isrecommend`='1' order by albumid desc limit $lstart,28");

$albumNum = $db->findCount("select * from ".dbprefix."photo_album  where `isrecommend`='1'");

$pageUrl = pagination($albumNum, 28, $page, $url);



//获取最新的评论
$arrComments = $db->findAll("select * from ".dbprefix."photo_comment order by addtime desc limit 30");
foreach($arrComments as $key=>$item){
	$arrComment[] = $item;
	$arrComment[$key]['user'] = aac('user')->getOneUser($item['userid']);;
}


$title = '最新相册';
include template("index");