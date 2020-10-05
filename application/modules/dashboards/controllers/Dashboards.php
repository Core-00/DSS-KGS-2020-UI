<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboards extends MX_Controller {

	public function index(){
		$this->template->write_view('index');
	}

	public function help(){
		$this->template->write_view('help');
	}
}
?>
