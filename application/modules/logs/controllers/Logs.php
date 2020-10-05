<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Logs extends MX_Controller {

	// public function index(){
	// 	$this->template->write_view('detail-log');
	// }

	public function detail(){
		$this->template->write_view('detail-log');
	}
}
?>
