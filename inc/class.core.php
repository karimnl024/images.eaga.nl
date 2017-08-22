<?php
if(!defined('_IN_SYSTEM_')) { 
	die("This file is protected. IP logged: " . $_SERVER['REMOTE_ADDR']);
}

class Core {

	/*
	*	Global error reporting. 1: User friendly message. 2: __LINE__, 3: error.log, exception handler. 
	*/
	public function error($msg, $line, $log = "Unknown error") {
		echo "<h2>An error has occurred</h2>";
		echo "<h4>".$msg."</h4>";
		$content= file_get_contents('error.log');
		file_put_contents("error.log", $content ."\n". $log." -> at line ". $line ." at ".date("d-m-Y H:i:s"));
		exit;
	}

}