<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Accounts extends MX_Controller {

	public function index(){
		// $this->template->write_view('index');
		$this->load->view('index');
	}
}
?>
