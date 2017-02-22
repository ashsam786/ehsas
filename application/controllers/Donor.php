<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor extends CI_Controller {

	/**
	 * Donor controller
	 * Author Amir Samad Hanga
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('donor_model');
	}

	/*
	* Donor register function
	*/

	public function index()
	{
		if(isset($this->session->donor_name) && $this->session->donor_name != ''){
			$url = base_url("donor/view/".$this->session->donor_contact);
			header('Location: '.$url);
		}

		$this->load->library('recaptcha');
		$this->load->config('recaptcha');

		$data['country_list'] = $this->donor_model->get_country_list();
		$data['hospital_list'] = $this->donor_model->get_hospital_list();
		$data['reCaptcha_html'] =  $this->recaptcha->getWidget(['data-type' => 'image']);
		$data['reCaptcha_script_tag'] =  $this->recaptcha->getScriptTag();

		$this->load->view('template/header', $data);
		$this->load->view('register', $data);
		$this->load->view('template/footer', $data);
	}

	public function getStates(){
		$data = $this->donor_model->getStates();
		echo json_encode($data);
	}

	public function getCities(){
		$data = $this->donor_model->getCities();
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
		    $res = $this->donor_model->save_donor_form();
		} else{
			$res = ['result' => false, 'msg' => ['Incorrect Captcha']];
		}

		echo json_encode($res);
	}



	public function login($errorArray = null){
		if($this->session->has_userdata('donor_name')){
			$url = base_url("donor/view/".$this->session->donor_contact);
			header('Location: '.$url);
		}

		$data['title'] = 'Ehsas | User login';

		$this->load->view('template/header', $data);
		$this->load->view('login', $data);
		$this->load->view('template/footer', $data);
	}


	public function view()
	{
		$data['title'] = 'Ehsas | '.$this->session->donor_name.' profile';
		$contact = $this->uri->segment(3);
		$data['donorDetail'] = $this->donor_model->getDonorByContact($contact);
		
		$this->load->view('template/header', $data);
		$this->load->view('donor/view', $data);
		$this->load->view('template/footer', $data);

	}


	public function loginProcess(){
		$res = $this->donor_model->login();
		echo json_encode($res);
	}

	public function logout(){
		$this->session->unset_userdata('donor_id');
		$this->session->unset_userdata('donor_contact');
		$this->session->unset_userdata('donor_name');
		
		header('Location: '.base_url('home'));
	}
}
