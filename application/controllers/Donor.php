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
		$this->load->library('email');
	}
	/*
	* Donor register function
	*/
	public function register(){
		//if(isset($this->session->donor_name) && $this->session->donor_name != ''){
		if($this->session->has_userdata('donor_name')){
			$url = base_url("donor/view/".$this->session->userid);
			header('Location: '.$url);
		}

		//$this->load->library('recaptcha');
		//$this->load->config('recaptcha');
		

		$data['country_list'] = $this->donor_model->get_country_list();
		$data['hospital_list'] = $this->donor_model->get_hospital_list_array();
		//$data['reCaptcha_html'] =  $this->recaptcha->getWidget(['data-type' => 'image']);
		//$data['reCaptcha_script_tag'] =  $this->recaptcha->getScriptTag();

		$this->load->view('template/header', $data);
		$this->load->view('register', $data);
		$this->load->view('template/footer', $data);
	}

	public function login($errorArray = null){
		if($this->session->has_userdata('donor_name')){
			$url = base_url("donor/view/".$this->session->userid);
			header('Location: '.$url);
		}

		$data['title'] = 'Ehsas | User login';

		$this->load->view('template/header', $data);
		$this->load->view('login', $data);
		$this->load->view('template/footer', $data);
	}

	public function passwordreset($errorArray = null){
		if($this->session->has_userdata('donor_name')){
			$url = base_url("donor/view/".$this->session->userid);
			header('Location: '.$url);
		}

		$data['title'] = 'Ehsas | Password reset';

		$this->load->view('template/header', $data);
		$this->load->view('donor/passwordreset', $data);
		$this->load->view('template/footer', $data);
	}

	public function updatepassword(){
		$data['title'] = 'Ehsas | Password reset';
		$data['link'] = $this->donor_model->checkUrlValidity();
		$data['hash'] = $this->uri->segment(3);
		$data['userId'] = $this->uri->segment(4);

		$this->load->view('template/header', $data);
		$this->load->view('donor/updatepassword', $data);
		$this->load->view('template/footer', $data);
	}

	public function updatepassword_process(){
		$data['title'] = 'Ehsas | Password reset';
		$data['message'] = $this->donor_model->updatepassword();
		echo json_encode($data['message']);
	}

	public function logout(){
		$this->session->unset_userdata('donor_id');
		$this->session->unset_userdata('donor_contact');
		$this->session->unset_userdata('donor_name');
		$this->session->unset_userdata('userid');
		
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

		if(!$contact){
			show_404();
		}		
		
		if($contact != $this->session->userid){
			$data['donor'] = 'unauthorised';
		} else{
			$data['donor'] = $this->donor_model->getDonorByContact($contact);
			$data['donor']->days_passed = ($data['donor'] && $data['donor']->last_time_donated) ? getDaysFromToday($data['donor']->last_time_donated) : '';			
		}

		$this->load->view('template/header', $data);
		if($data['donor'] == 'unauthorised'){
			$this->load->view('errors/unauthorised', $data);
		} else{
			$this->load->view('donor/view', $data);
		}
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
		
		if($contact != $this->session->userid){
			$data['donor'] = 'unauthorised';
		} else{
			$data['donor'] = $this->donor_model->getDonorByContact($contact);
			$data['hospital_list'] = $this->donor_model->get_hospital_list_array();
			$data['country_list'] = $this->donor_model->get_country_list();
			
			$data['stateList'] = [];
			$data['cityList'] = [];
			if($data['donor'] && !empty($data['donor']->country)){
				$data['stateList'] = json_decode(file_get_contents(base_url("getStates?country_id={$data['donor']->country}")));
			}

			if($data['donor'] && !empty($data['donor']->state)){
				$data['cityList'] = json_decode(file_get_contents(base_url("getCities?state_id={$data['donor']->state}")));
			}

			$data['donor']->days_passed = $data['donor']->last_time_donated ? getDaysFromToday($data['donor']->last_time_donated) : '';
		}
	
		$this->load->view('template/header', $data);
		if($data['donor'] == 'unauthorised'){
			$this->load->view('errors/unauthorised', $data);
		} else{
			$this->load->view('donor/edit', $data);
		}
		$this->load->view('template/footer', $data);		

	}

	public function registerProcess(){
		if(!$this->input->post()){
			show_404();
		}
		
		//$this->load->library('recaptcha');
		//$recaptcha = $this->input->post('g-recaptcha-response');
		//$response = $this->recaptcha->verifyResponse($recaptcha);

		//if (isset($response['success']) and $response['success'] === true) {
		    $res = $this->donor_model->save_donor_form();
		//} else{
		//	$res = ['result' => false, 'msg' => ['Incorrect Captcha']];
		//}

		if($res['result']){
			$sub = $this->lang->line('register_confirm_male_subject');
			$name = $this->input->post('f1-name');
			$message = $this->load->view('emails/registration', ['name' =>$name], true);
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);


			$this->email->from(NOREPLY_EMAIL, 'Ehsas Registration');
			$this->email->to($this->input->post('f1-email'));
			$this->email->cc(REGISTRATION_ADMIN_EMAIL);
			//$this->email->bcc('them@their-example.com');
			$this->email->subject($sub);
			$this->email->message($message);
			$this->email->send();			
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

	public function resetpassword_process(){
		$res = $this->donor_model->resetpassword();

		if($res['result']){
			$sub = 'Password recovery link';
			$url = $res['data']['url'];
			$name = $res['data']['user']->name;
			$message = $this->load->view('emails/passwordreset', ['name' =>$name, 'pass_recovery_link' => $url], true);
			$config['mailtype'] = 'html';
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);


			$this->email->from(NOREPLY_EMAIL, 'Ehsas Registration');
			$this->email->to($this->input->post('f1-email'));
			$this->email->cc(REGISTRATION_ADMIN_EMAIL);
			//$this->email->bcc('them@their-example.com');
			$this->email->subject($sub);
			$this->email->message($message);
			$this->email->send();			
		}

		$this->session->set_flashdata('alert-message', $res);
		redirect(base_url('donor/passwordreset'), 'refresh');			
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
