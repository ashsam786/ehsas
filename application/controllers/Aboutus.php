<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {
	
	private $page = 'aboutus';
	
	function __construct(){
		parent::__construct();
 		$this->load->helper('assets');
	}

	/*
	* blood requirement form
	*/
	public function index(){
		//$data['cms'] = get_page_detail($this->page);
		$data['title'] = 'About us | '.MAIN_TITLE;
		
		$this->load->view('template/header_main', $data);
		$this->load->view('aboutus', $data);
		$this->load->view('template/footer_main', $data);
	}
}
