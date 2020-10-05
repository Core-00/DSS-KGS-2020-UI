<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Landings extends MX_Controller {

	public function index(){
		$this->load->view('landing_1');
	}

	public function kgs(){
		$this->load->view('landing_2');
	}

	public function tfric19(){
		$this->load->view('landing_3');
	}
}
?>
