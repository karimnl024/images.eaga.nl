<?php
if(!defined('_IN_SYSTEM_')) { 
	die("This file is protected. IP logged: " . $_SERVER['REMOTE_ADDR']);
}

class Database {
	public $settings = array();
	public $database;

	public function __construct($settings) {
		$this->settings = $settings;
		$this->connect($settings);
	}

	public function connect() {
		try {
			$this->db = new PDO('mysql:host='.$this->settings['host'].';dbname='.$this->settings['database'], $this->settings['username'], $this->settings['password']);
		}
		catch (PDOException $e) {
			global $core;
			$core->error('Database is unavailable', __LINE__, $e->getMessage());
		}
	}
}