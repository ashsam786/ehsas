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
