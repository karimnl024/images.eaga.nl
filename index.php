<?php
define('_IN_SYSTEM_', 1);
require_once("inc/system.init.php");

$index = new tpl($tpl_dir);
$index->init();


$index->setTitle('Eaga.nl');

$index->loadComp('link', 'index.link');
$index->loadComp('body', 'index.upload');

echo $index->dump();