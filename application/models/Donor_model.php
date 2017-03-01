<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class donor_model extends CI_Model{
	private $table = 'donor_list';

	public function __construct(){
		parent::__construct();
	}
	
	public function getDonorByContact($contact){
		try{
			$this->db->select('donor_list.*, countries.country as country_name, states.state as state_name, cities.city as city_name');
			$this->db->join('countries', 'donor_list.country = countries.id');
			$this->db->join('states', 'donor_list.state = states.id');
			$this->db->join('cities', 'donor_list.city = cities.id');
			$qry = $this->db->get_where($this->table, ['contact' => $contact]);

			if($qry->num_rows() != 1){
				throw new Exception($this->lang->line('error_invalid_contact'));
			}
			return $qry->row();
		} catch(Exception $e){
			return false;
		}
	}

	public function login(){
		try{
			$errors = [];
			if(null == $this->input->post('f1-userId') || $this->input->post('f1-userId') == ''){
				throw new Exception($this->lang->line('error_mobile'));
			}

			if(null == $this->input->post('f1-password') || $this->input->post('f1-password') == ''){
				throw new Exception($this->lang->line('error_password'));
			}

			$userId = $this->input->post('f1-userId');
			$password = $this->input->post('f1-password');
			$where = ['contact' => $userId, 'pass' => md5($password)];

			$qry = $this->db->get_where('donor_list', $where);
			if($qry->num_rows() != 1){
				throw new Exception($this->lang->line('error_login_credientials'));
			}
			$dbData = $qry->row();

			$this->session->donor_id = $dbData->id;
			$this->session->donor_contact = $dbData->contact;
			$this->session->donor_name = $dbData->name;
			$this->session->userid = $dbData->contact;
			
			$data = ['result' => true, 'msg' => $this->lang->line('error_login_successful'), 'contact' => $dbData->contact];

		} catch(Exception $e){
			$data = ['result' => false, 'msg' => $e->getMessage()];
		}

		return $data;
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
	
	public function get_hospital_list_array(){
		$this->db->select('nearby_hospital');
		$data = $this->db->get('hospital_list');
		$data = $data->result_array();
		
		$hospital_array = [];
		foreach($data as $i => $v){
			$hospital_array[] = $v['nearby_hospital'];
		}
		
		return $hospital_array;
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
				'email'				=> $this->input->post('f1-email')
			);

			$sessionId = $this->session->donor_id;

			$contactCount = $this->db->get_where($this->table, ['contact' => $data['contact']]);
			$contactdata = $contactCount->row();
			$contactCount = $contactCount->num_rows();

			$emailCount = $this->db->get_where($this->table, ['email' => $data['email']]);
			$emaildata = $emailCount->row();
			$emailCount = $emailCount->num_rows();

			if(null !== $this->input->post('donor') && !empty($this->input->post('donor'))){
				$id = base64_decode($this->input->post('donor'));
				if($id != $sessionId){
					throw new Exception($this->lang->line('error_unauthorised_access'));
				} else{
					if($contactCount && $contactCount > 0 && $contactdata->id !== $sessionId){
						$errors['f1-contact-number'] = $this->lang->line('error_duplicate_mobile');
					}

					if($emailCount && $emailCount > 0 && $emaildata->id !== $sessionId){
						$errors['f1-contact-number'] = $this->lang->line('error_duplicate_email');
					}
				}
			} else{
				if($contactCount && $contactCount > 0){
					$errors['f1-contact-number'] = $this->lang->line('error_duplicate_mobile');
				}

				if($emailCount && $emailCount > 0){
					$errors['f1-contact-number'] = $this->lang->line('error_duplicate_email');
				}
			}

			if($data['name'] == "" || $data['gender'] == "" || $data['last_time_donated'] == "" || $data['country'] == "" || $data['state'] == "" || $data['city'] == "" || $data['contact'] == "" || $data['nearby_hospital'] == "" || $data['how_you_know_us'] == "" || $this->input->post('f1-email') == ""){
				$errors['required'] = $this->lang->line('error_incomplete_form');
			}

			if(!preg_match('/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/', $data['contact'])){
				$errors['f1-contact-number'] = 'Please enter a valid mobile number';
			}

			if(!preg_match('/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/', $data['contact'])){
				$errors['f1-contact-number'] = $this->lang->line('error_invalid_mobile');
			}

			if($data['alternate_contact'] != "" && preg_match('/^(\+91-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/', $data['contact'])){
				$errors['f1-alternate-number'] = $this->lang->line('error_invalid_alternate_mobile');
			}

			if(!empty($errors)){
				return ['result' => false, 'msg' => $errors];
			}
			
			if(isset($id)){
				$this->db->where('id', $id);
				if(!$this->db->update($this->table, $data)){
					throw new Exception($this->lang->line('error_general'));
				}
				$data = ['result' => true, 'msg' => [$this->lang->line('error_profile_update_success')]];
			} else {
				if($this->input->post('f1-password') == "" || $this->input->post('f1-repeat-password') != $this->input->post('f1-password')){
					throw new Exception($this->lang->line('error_password'));
				}

				$data['pass'] = md5($this->input->post('f1-password'));
				if(!$this->db->insert($this->table, $data)){
					throw new Exception($this->lang->line('error_general'));
				}
				$data = ['result' => true, 'msg' => [$this->lang->line('error_form_thanku_msg')]];
			}

			
		} catch(Exception $e){ 
			$data = ['result' => false, 'msg' => [$e->getMessage()]];
		}

		return $data;
	}

	public function resetpassword(){
		try{
			$email = $this->input->post('f1-email');
			$hash = md5(uniqid());

			if(!$email){
				throw new Exception($this->lang->line('error_no_email_provided'));
			}

			$this->db->where('email', $email);
			if($this->db->update($this->table, ['hash' => $hash])){
				$user = $this->db->get_where($this->table, ['email' => $email]);
				if($user->num_rows() == 1){
					$user = $user->row();	
					$userId = $user->contact;
					$data['url'] = base_url("donor/updatepassword/{$user->hash}/{$userId}");
					$data['user'] = $user;
					$msg = $this->lang->line('error_check_mail_pass_recovery');
					return ['result' => true, 'msg' => $msg, 'data' => $data];
				}else{
					throw new Exception($this->lang->line('error_no_email_provided'));		
				}
			} else{
				throw new Exception($this->lang->line('error_general'));	
			}
		} catch(Exception $e){
			return ['result' => false, 'msg' => $e->getMessage()];
		}
	
	}	

	public function updatepassword(){
		$pass = $this->input->post('f1-password');
		$pass1 = $this->input->post('f1-cpassword');
		$userId = $this->input->post('f1-userId');
		$hash = $this->input->post('f1-hash');

		if($pass == '' || $pass != $pass1){
			return ['result' => false, 'link' => 'norefresh', 'message' => 'Password and confirm password cannot be empty and must be same'];
		}

		$ver = $this->db->get_where($this->table, ['contact' => $userId, 'hash' => $hash]);
		$ver = $ver->num_rows();

		if($ver != 1){
			return ['result' => false, 'message' => 'Invalid or expired link used.'];
		}

		$this->db->where('hash', $hash);
		$this->db->where('contact', $userId);
		if($this->db->update($this->table, ['hash' => '', 'pass' => md5($pass)])){
			return ['result' => true, 'message' => 'Password updated successfully. <a href="'.base_url('donor/login').'">Click</a> here to login'];
		} else{
			return ['result' => false, 'message' => 'Password update error. Please try again.'];
		}
	}	

	public function checkUrlValidity(){
		$hash = $this->uri->segment(3);
		$contact = $this->uri->segment(4);
		if(!$contact || !$hash){
			return false;
		}

		$ver = $this->db->get_where($this->table, ['contact' => $contact, 'hash' => $hash]);
		$ver = $ver->num_rows();
		if($ver == 1){
			return true;
		}
		return false;
	}
}
// end of file
