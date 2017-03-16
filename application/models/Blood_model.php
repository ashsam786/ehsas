<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blood_model extends CI_Model{
	private $table = 'blood_requirements';

	public function __construct(){
		parent::__construct();
	}

	public function save_blood_requirement(){
		try{
			$errors = [];
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'mobile' => $this->input->post('mobile'),
				'alternateMobile' => $this->input->post('alternateMobile'),
				'email' => $this->input->post('email'),
				'patient_name' => $this->input->post('pName'),
				'patient_age' => $this->input->post('pAge'),
				'patient_gender' => $this->input->post('dGender'),
				'blood_group' => $this->input->post('f1-blood-group'),
				'number_of_units' => $this->input->post('numberOfUnitsRequired'),
				'required_before' => $this->input->post('requiredOn'),
				'reason' => $this->input->post('reason'),
				'hospital_name' => $this->input->post('hospital'),
				'city' => $this->input->post('f1-city'),
				'state' => $this->input->post('f1-state'),
				'country' => $this->input->post('f1-country'),
				'address' => $this->input->post('localAddress')	
			);

			$required = ['name', 'mobile', 'email', 'pName', 'pAge', 'dGender', 'f1-blood-group', 'numberOfUnitsRequired', 'requiredOn', 'hospital', 'f1-city', 'f1-state', 'f1-country', 'localAddress'];

			$errors['required'] = [];
			foreach($required as $i => $v){
				if($this->input->post($v) == ""){
					$errors['required'][] = $v;
				}				
			}

			if(!validateDate($data['required_before'])){
				$errors['required'][] = 'requiredOn';
			}
	
			if(!empty($errors['required'])){
				return ['result' => false, 'msg' => 'Invalid form fields submitted. Please enter valid data', 'errors' => $errors];
			}

			//if(!preg_match('/^(\+91-?|0?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/', $data['contact'])){
			if(!preg_match(MOBILE_NUMBER_REGEX, $data['mobile'])){
				$errors['required'][] = 'mobile';
				return ['result' => false, 'msg' => $this->lang->line('error_invalid_mobile'), 'errors' => $errors];
			}

			if($data['alternateMobile'] != "" && !preg_match(MOBILE_NUMBER_REGEX, $data['alternateMobile'])){
				$errors['required'][] = 'alternateMobile';
				return ['result' => false, 'msg' => $this->lang->line('error_invalid_alternate_mobile'), 'errors' => $errors];
			}
			
			if(!$this->db->insert($this->table, $data)){
				throw new Exception($this->lang->line('error_general'));
			}
			
			$where = ['c.id' => $data['city']];
			$this->db->select(['c.city as city', 's.state as state', 'co.country as country']);
			$this->db->join('states as s', 's.id = c.state_id', 'left');
			$this->db->join('countries as co', 'co.id = s.country_id', 'left');
			$cityAddress = $this->db->get_where('cities as c', $where);
			
			$cityAddress = $cityAddress->row();
			
			$data['city'] = $cityAddress->city;
			$data['state'] = $cityAddress->state;
			$data['country'] = $cityAddress->country;
			
			$data = ['result' => true, 'data' => $data];
			
		} catch(Exception $e){ 
			$data = ['result' => false, 'msg' => $e->getMessage()];
		}
		return $data;
	}

	public function get_blood_requirement_list($num = null){
		$this->db->order_by('added_at', 'DESC');
		if($num != null){
			$this->db->limit($num);
		}
		
		$this->db->select($this->table.'.*, countries.country as country_name, states.state as state_name, cities.city as city_name');
		$this->db->join('countries', $this->table.'.country = countries.id', 'left');
		$this->db->join('states', $this->table.'.state = states.id', 'left');
		$this->db->join('cities', $this->table.'.city = cities.id', 'left');

		$data = $this->db->get_where($this->table, ['status !=' => '0']);
		
		return $data->result();
	}
}
// end of file
