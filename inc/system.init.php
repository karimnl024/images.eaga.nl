<?php
if(!defined('_IN_SYSTEM_')) { 
	die("This file is protected. IP logged: " . $_SERVER['REMOTE_ADDR']);
}

require_once('configuration.php');
require_once('class.core.php');
require_once('class.db.php');
require_once('class.tpl.php');

$core = new Core();
$db = new Database($SQL_credentials);
