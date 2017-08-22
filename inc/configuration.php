<?php
if(!defined('_IN_SYSTEM_')) { 
	die("This file is protected. IP logged: " . $_SERVER['REMOTE_ADDR']);
}

$SQL_credentials = array(
	'host'	   => 'localhost',
	'username' => 'admin_test',
	'password' => '--!',
	'database' => 'admin_test'
);

$tpl_dir = '/home/admin/web/images.eaga.nl/public_html/inc/tpl';
$tpl_vars = array(
	'url' => 'http://127.0.0.1',
	'statics' => 'http://127.0.0.1/statics'
);