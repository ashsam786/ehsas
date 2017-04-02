<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blood extends CI_Controller {

	/**
	 * Donor controller
	 * Author Amir Samad Hanga
	 */
	function __construct(){
		parent::__construct();
		$this->load->model('blood_model');
		$this->load->helper('assets');
		$this->lang->load('form_errors', 'english');
		$this->load->library('email');
	}

	/*
	* function to submit donor nomination for blood donation
	*/
	public function donate(){
		$requirement_id = $this->uri->segment(3);
		if(!$requirement_id){
			show_404();
		}

		if(!$this->session->has_userdata('donor_name') && !$this->session->has_userdata('admin_name')){
			$url = base_url('donor/login');
			$this->session->referal_url = getCurrentUrl();
			header('Location: '.$url); die();
		}
		
		$res = $this->blood_model->donateBlood($requirement_id);

		if(!$res['result']){
			$this->session->set_flashdata('error-message', $res['msg']);
		} else{
			$this->session->set_flashdata('success-message', $this->lang->line('success_blood_donation_nomination_success'));	
		}

		header('Location: '.base_url('blood/requirement_list'));
	}

	/*
	* blood requirement form
	*/
	public function requirement(){

		$data['pageHeaderType'] = 'components-page';
		$data['country_list'] = get_country_list();
		$data['hospital_list'] = get_hospital_list_array();
		//$data['reCaptcha_html'] =  $this->recaptcha->getWidget(['data-type' => 'image']);
		//$data['reCaptcha_script_tag'] =  $this->recaptcha->getScriptTag();

		$this->load->view('template/header_main', $data);
		$this->load->view('blood/requirement', $data);
		$this->load->view('template/footer_main', $data);
	}

	/*
	* blood requirement list
	*/
	public function requirement_list(){
		$data['title'] = 'Blood Requirement | '.MAIN_TITLE;
		$data['pageHeaderType'] = 'components-page';
		$data['requirement_list'] = $this->blood_model->get_blood_requirement_list();

		$this->load->view('template/header_main', $data);
		$this->load->view('blood/requirement_list', $data);
		$this->load->view('template/footer_main', $data);
	}

	/*
	* provides list of blood requirememtns requests in json format
	*/
	public function requirement_data(){
		$data['title'] = 'Blood Requirement | '.MAIN_TITLE;
		$data['requirement_list'] = $this->blood_model->get_blood_requirement_list();

		echo json_encode($data['requirement_list']); die;
	}

	/*
	* process blood requirement form
	*/
	public function process_requirement(){
		$bReq = $this->blood_model->save_blood_requirement();

		if(!$bReq['result']){
			$this->session->set_flashdata('alert-message', $bReq['msg']);
			$this->session->set_flashdata('required_data_missing', $bReq['errors']['required']);
		}else{
			$data = $bReq['data'];
			$data['recievedAt'] = date('M-d-Y');
			$this->session->set_flashdata('formData', $_POST);
			$this->session->set_flashdata('success-message', 'Requirement submitted successfully. ');
			$this->sendRequestConfirmationMail($data);			
		}
		redirect('/blood/requirement');
	}

	private function sendRequestConfirmationMail($data){
		$sub = $this->lang->line('blood_requirement_request_recieved');
		$sub_user = $this->lang->line('blood_requirement_request_submitted');
		
		$name = $data['name'];
		
		$message = $this->load->view('emails/bloodRequestInfo', $data, true);
		$message_user = $this->load->view('emails/bloodRequestUser', $data, true);
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;

		//send to user 
		$this->email->initialize($config);
		$this->email->from(NOREPLY_EMAIL, MAIN_TITLE);
		$this->email->to($data['email']);
		//$this->email->cc(INFO_EMAIL);
		//$this->email->bcc(INFO_EMAIL);
		$this->email->subject($sub_user);
		$this->email->message($message_user);
		$this->email->send();

		//send to ehsas admin
		$this->email->initialize($config);
		$this->email->from(NOREPLY_EMAIL, MAIN_TITLE);
		$this->email->to(INFO_EMAIL);
		$this->email->subject($sub);
		$this->email->message($message);
		$this->email->send();		
	}



}
