<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('donor_model');
		$this->lang->load('home', 'english');
	}

	function index(){
		$data['pageHeaderType'] = 'index-page';
/*		if(!$this->session->has_userdata('donor_name')){
			$url = base_url("donor/register");
			header('Location: '.$url);
		}*/
		$data['title'] = MAIN_TITLE;
		$data['country_list'] = $this->donor_model->get_country_list();

		$this->load->view('template/header_main', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer_main', $data);
	}
}
