<?php
defined('IN_TS') or die('Access Denied.');

$old = $_GET['old'];

$update = $db->find("select * from ".dbprefix."app_update where appname='$app' and old='$old'");

echo $_GET['callback'].'('.json_encode($update).')';