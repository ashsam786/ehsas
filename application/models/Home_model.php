<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model{
	private $table = 'donor_list';

	public function __construct(){
		parent::__construct();
	}
	
	public function getStates(){
		$country_id = $this->input->get('country_id');
		$data =  $this->db->get_where('states', ['country_id' => $country_id]);
		return $data->result();
	}

	public function getCities(){
		$state_id = $this->input->get('state_id');
		$data =  $this->db->get_where('cities', ['state_id' => $state_id]);
		return $data->result();
	}

	public function get_country_list(){
		$data =  $this->db->get('countries');
		return $data->result();
	}

/*	public function get_district_list(){
		$data =  $this->db->get('district_list');
		return $data->result();
	}*/

	public function get_hospital_list(){
		$data =  $this->db->get('hospital_list');
		return $data->result();
	}

	public function save_donor_form(){
		try{
			$errors = [];
			$data = array(
				'last_time_donated'	=> $this->input->post('f1-last-time-donated'),
				'name'				=> $this->input->post('f1-first-name'),
				'address'			=> $this->input->post('f1-address'),
				'country'			=> $this->input->post('f1-country'),
				'state'				=> $this->input->post('f1-state'),
				'city'				=> $this->input->post('f1-city'),
				'contact'			=> $this->input->post('f1-contact-number'),
				'alternate_contact'	=> $this->input->post('f1-alternate-number'),
				'blood_group'		=> $this->input->post('f1-blood-group'),
				'nearby_hospital'	=> $this->input->post('f1-hospital-nearby'),
				'how_you_know_us'	=> $this->input->post('f1-how-know'),
				'gender'			=> $this->input->post('f1-gender'),
				'email'				=> $this->input->post('f1-email'),
				'pass'				=> $this->input->post('f1-password') ? md5($this->input->post('f1-password')) : ''
			);

			if($data['name'] == "" || $data['gender'] == "" || $data['last_time_donated'] == "" || $data['country'] == "" || $data['state'] == "" || $data['city'] == "" || $data['contact'] == "" || $data['nearby_hospital'] == "" || $data['how_you_know_us'] == "" || $data['pass'] == "" || $this->input->post('f1-email') == ""){
				$errors['required'] = 'Please fill all the required fields';
			}

			if($this->input->post('f1-repeat-password') != $this->input->post('f1-password')){
				$errors['f1-password'] = 'Password and confirm password must be same';
			}

			if(!preg_match('/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/', $data['contact'])){
				$errors['f1-contact-number'] = 'Please enter a valid mobile number';
			}

			$contactCount = $this->db->get_where($this->table, ['contact' => $data['contact']]);
			$contactCount = $contactCount->num_rows();

			if($contactCount && $contactCount > 0){
				$errors['f1-contact-number'] = 'Your phone is already registered. Please login with your credential or use another phone number';
			}

			if($data['alternate_contact'] != "" && preg_match('/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/', $data['contact'])){
				$errors['f1-alternate-number'] = 'Please enter a valid mobile number';
			}

			if(!empty($errors)){
				return ['result' => false, 'msg' => $errors];
			}

			if(!$this->db->insert($this->table, $data)){
				throw new Exception('Error occured. Please try after some time');
			}

			$data = ['result' => true, 'msg' => FORM_THANKU_MSG];
		} catch(Exception $e){
			$data = ['result' => false, 'msg' => [$e->getMessage()]];
		}

		return $data;
	}


}
// end of file
