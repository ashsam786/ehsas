<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class other_initiatives extends CI_Controller {

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
		$this->load->model('other_initiatives_model');
		//$this->lang->load('other_initiatives', 'english');
	}

	public function category($category = null){
		$data['title'] = $category.' | '.MAIN_TITLE;
		
		$data['initiatives_list'] = $this->other_initiatives_model->getInitiativesByCategory($category);
		if(sizeof($data['initiatives_list']) == 0){
			show_404();
		}

		$this->load->view('template/header_main', $data);
		$this->load->view('other_initiatives/category', $data);
		$this->load->view('template/footer_main', $data);
	}
}
