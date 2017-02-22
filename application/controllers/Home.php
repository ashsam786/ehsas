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
	}

	public function index()
	{
		if(isset($this->session->donor_name) && $this->session->donor_name != ''){
			$url = base_url("donor/view/".$this->session->donor_contact);
			header('Location: '.$url);
		}

		$this->load->library('recaptcha');
		$this->load->config('recaptcha');

		$data['country_list'] = $this->home_model->get_country_list();
		$data['hospital_list'] = $this->home_model->get_hospital_list();
		$data['reCaptcha_html'] =  $this->recaptcha->getWidget(['data-type' => 'image']);
		$data['reCaptcha_script_tag'] =  $this->recaptcha->getScriptTag();

		$this->load->view('template/header', $data);
		$this->load->view('home', $data);
		$this->load->view('template/footer', $data);
	}

	public function getStates(){
		$data = $this->home_model->getStates();
		echo json_encode($data);
	}

	public function getCities(){
		$data = $this->home_model->getCities();
		echo json_encode($data);
	}

	public function process_form(){
		if(!$this->input->post()){
			show_404();
		}
		
		$this->load->library('recaptcha');
		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);

		if (isset($response['success']) and $response['success'] === true) {
		    $res = $this->home_model->save_donor_form();
		} else{
			$res = ['result' => false, 'msg' => ['Incorrect Captcha']];
		}

		echo json_encode($res);
	}
}
