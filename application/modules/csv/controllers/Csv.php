<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Csv extends MX_Controller {

	public function add(){
		$this->template->write_view('add');
	}

	public function edit(){
		$this->template->write_view('edit');
	}

	public function detail(){
		$this->template->write_view('detail');
	}

	public function list_history(){
		$this->template->write_view('list_history');
	}
}
?>
