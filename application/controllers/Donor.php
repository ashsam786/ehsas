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
		$this->load->helper('assets');
		$this->lang->load('form_errors', 'english');
	}

	/*
	* Donor register function
	*/
	public function register(){
		//if(isset($this->session->donor_name) && $this->session->donor_name != ''){
		if($this->session->has_userdata('donor_name')){
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

	public function logout(){
		$this->session->unset_userdata('donor_id');
		$this->session->unset_userdata('donor_contact');
		$this->session->unset_userdata('donor_name');
		
		header('Location: '.base_url('home'));
	}

	public function view(){
		if(!$this->session->has_userdata('donor_name') && !$this->session->has_userdata('admin_name')){
			$url = base_url('donor/login');
			$this->session->referal_url = getCurrentUrl();
			header('Location: '.$url);
		}

		$data['title'] = 'Ehsas | '.$this->session->donor_name.' profile';
		$contact = $this->uri->segment(3);
		$data['donor'] = $this->donor_model->getDonorByContact($contact);

		$data['donor']->days_passed = $data['donor']->last_time_donated ? getDaysFromToday($data['donor']->last_time_donated) : '';
	
		$this->load->view('template/header', $data);
		$this->load->view('donor/view', $data);
		$this->load->view('template/footer', $data);

	}

	public function edit(){
		if(!$this->session->has_userdata('donor_name') && !$this->session->has_userdata('admin_name')){
			$url = base_url('donor/login');
			$this->session->referal_url = getCurrentUrl();
			header('Location: '.$url);
		}

		$data['title'] = 'Ehsas | '.$this->session->donor_name.' profile';
		$contact = $this->uri->segment(3);
		if(!$contact){
			show_404();
		}
		$data['donor'] = $this->donor_model->getDonorByContact($contact);
		$data['hospital_list'] = $this->donor_model->get_hospital_list();
		$data['country_list'] = $this->donor_model->get_country_list();
		
		$data['stateList'] = [];
		$data['cityList'] = [];
		if($data['donor'] && !empty($data['donor']->country)){
			$data['stateList'] = json_decode(file_get_contents("http://localhost/ehsas.in/getStates?country_id={$data['donor']->country}"));
		}

		if($data['donor'] && !empty($data['donor']->state)){
			$data['cityList'] = json_decode(file_get_contents("http://localhost/ehsas.in/getCities?state_id={$data['donor']->state}"));
		}

		$data['donor']->days_passed = $data['donor']->last_time_donated ? getDaysFromToday($data['donor']->last_time_donated) : '';
	
		$this->load->view('template/header', $data);
		$this->load->view('donor/edit', $data);
		$this->load->view('template/footer', $data);

	}

	public function registerProcess(){
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

	public function updateDonor(){
		if(!$this->input->post()){
			show_404();
		}

		$res = $this->donor_model->save_donor_form();
		$class = $res['result'] ? 'alert-success' : 'alert-danger';
		$alert_message = '';
		foreach($res['msg'] as $i => $v){
			$alert_message .= '<div class="alert '. $class .'">'. $v .'</div>';
		}
		
		$this->session->set_flashdata('alert-message', $alert_message);
		redirect(base_url('donor/edit/'.$this->input->post('f1-contact-number')), 'refresh');
	}

	public function loginProcess(){
		$res = $this->donor_model->login();
		if($this->session->has_userdata('referal_url') && $res['result']){
			$res['referal'] = $this->session->referal_url; 
		}
		echo json_encode($res);
	}

	public function getStates(){
		$data = $this->donor_model->getStates();
		echo json_encode($data);
	}

	public function getCities(){
		$data = $this->donor_model->getCities();
		echo json_encode($data);
	}	
}
