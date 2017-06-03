<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blood_model extends CI_Model{
	private $table = 'blood_requirements';

	public function __construct(){
		parent::__construct();
	}

	public function donateBlood($requirement_id){
		try{

			$enq = $this->db->get_where('blood_requirements', ['id' => $requirement_id]);
			if($enq->num_rows() == 0){
				show_404();
			}

			$data = [
				'donor_list_id' => $this->session->donor_id,
				'blood_requirements_id' => $requirement_id,
			];

			$enq = $this->db->get_where('blood_donation', $data);
			if($enq->num_rows() > 0){
				throw new Exception('You have already registered for this requirement');
			}

			if(!$this->db->insert('blood_donation', $data)){
				throw new Exception($this->lang->line('error_general'));
			}

			$data = ['result' => true, 'id' => $this->db->insert_id()];
		} catch(Exception $e) { 
			$data = ['result' => false, 'msg' => $e->getMessage()];
		}

		return $data;
	}

	public function donateBloodCancel($requirement_id){
		try{

			$enq = $this->db->get_where('blood_requirements', ['id' => $requirement_id]);
			if($enq->num_rows() == 0){
				show_404();
			}

			$data = [
				'donor_list_id' => $this->session->donor_id,
				'blood_requirements_id' => $requirement_id,
			];

			$this->db->where($data);
			$enq = $this->db->delete('blood_donation');
			if($enq){
				$data = ['result' => true];	
			} else{
				throw new Exception($this->lang->line('error_general'));
			}
		} catch(Exception $e) { 
			$data = ['result' => false, 'msg' => $e->getMessage()];
		}

		return $data;
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

			$data['required_before'] = date('Y-m-d H-m-s', strtotime($data['required_before']));

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
		
		$where = ['status !=' => '0'];
		
/*		if($this->session->has_userdata('donor_id')){
			$where['blood_donation.donor_list_id'] = $this->session->donor_id;
		}*/

		$this->db->select($this->table.'.*, countries.country as country_name, states.state as state_name, cities.city as city_name, blood_donation.donor_list_id as donor_id');
		$this->db->join('countries', $this->table.'.country = countries.id', 'left');
		$this->db->join('states', $this->table.'.state = states.id', 'left');
		$this->db->join('cities', $this->table.'.city = cities.id', 'left');
		$this->db->join('blood_donation', $this->table.'.id = blood_donation.blood_requirements_id', 'left');

		$data = $this->db->get_where($this->table, $where)->result_array();	

		$result = [];

		foreach($data as $i => $v){
			if(!array_key_exists($v['id'], $result)){
				$result[$v['id']] = $v;
				$result[$v['id']]['donor_id'] = [];
			}

			if(!empty($v['donor_id'])){
				$result[$v['id']]['donor_id'][] = $v['donor_id'];
			}
		}

		return $result;
	}

	public function getBloodRequirementById($bloodRequirementId){
		
		$where = ['status !=' => '0', $this->table.'.id' => $bloodRequirementId];
		
		$this->db->select($this->table.'.*, countries.country as country_name, states.state as state_name, cities.city as city_name, blood_donation.donor_list_id as donor_id');
		$this->db->join('countries', $this->table.'.country = countries.id', 'left');
		$this->db->join('states', $this->table.'.state = states.id', 'left');
		$this->db->join('cities', $this->table.'.city = cities.id', 'left');
		$this->db->join('blood_donation', $this->table.'.id = blood_donation.blood_requirements_id', 'left');

		$data = $this->db->get_where($this->table, $where)->result_array();	

		$result = [];

		foreach($data as $i => $v){
			if(empty($result)){
				$result = $v;
				$result['donor_id'] = [];
			}

			if(!empty($v['donor_id'])){
				$result['donor_id'][] = $v['donor_id'];
			}
		}

		return $result;
	}
}
// end of file
