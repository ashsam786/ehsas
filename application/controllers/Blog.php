<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
	 * Donor controller
	 * Author Amir Samad Hanga
	 */
	function __construct(){
		parent::__construct();
		//$this->load->model('blood_model');
		//$this->load->helper('assets');
		//$this->lang->load('form_errors', 'english');
		//$this->load->library('email');
	}

	public function index(){
		$this->load->view('blog/blog');
	}

}
