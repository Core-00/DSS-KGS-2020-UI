<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Reports extends MX_Controller {

	public function index(){
		$this->template->write_view('index');
	}

	public function graph(){
		$this->template->write_view('reports_graph');
	}

	public function print(){
		$this->template->write_view('latest_reports_print');
	}

	public function print_reports(){
		$this->template->write_view('reports_print');
	}

	public function single_print(){
		$this->load->view('print');
	}

	public function fusion_print(){
		$this->load->view('print_fusion');
	}

}
?>
