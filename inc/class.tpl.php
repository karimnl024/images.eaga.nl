<?php
if(!defined('_IN_SYSTEM_')) { 
	die("This file is protected. IP logged: " . $_SERVER['REMOTE_ADDR']);
}

Class tpl {
	private $dir;
	private $html = null;
	private $tpl_vars = array();



	public function __construct($dir) {
		if($this->exists($dir, __LINE__)) {
			$this->dir = $dir; 
		} else {
			global $core;
			$core->error('Template not available', __LINE__, 'Directory does not exist. ('.$this->dir.')');
			return false;
		}
		global $tpl_vars;
		$this->tpl_vars = $tpl_vars; 
		return true;
	}

	private function exists($var, $line) {
		if(file_exists($this->dir.'/'.$var)) {
			return true;
		} else {
			global $core;
			$core->error('Template not available', $line, 'Directory does not exist. ('.$this->dir.')');
			return false;			
		}
	}

	public function init() {
		if($this->exists('standard_html.html', __LINE__)) {
			$this->html = file_get_contents($this->dir.'/standard_html.html');
		}
		return true;
	}

	public function loadComp($target, $component) {
		if($this->exists($component.'.comp.html', __LINE__)) {
			$comp_content = file_get_contents($this->dir.'/'.$component.'.comp.html');
			$this->html = str_replace('%'.$target.'%', $comp_content.'%'.$target.'%', $this->html);
			return true; 
		} else {
			return false;
		}
	}

	public function setTitle($title) {
		$this->html = str_replace('%title%', $title, $this->html);
	}

	public function vars() {
		foreach($this->tpl_vars as $key=>$var) {
			$this->html = str_replace('%'.$key.'%', $var, $this->html);
		}
		return true;
	}

	public function dump() {
		$this->vars();
		$this->html = preg_replace('/%(.*)%/', null, $this->html);
		return $this->html;
	}

}