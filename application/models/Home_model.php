<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model{
	private $table = 'donor_list';
	private $bloodRequirement = 'blood_requirements';
	private $othInitiativesTable = 'other_initiatives';
	private $othInitiativeCategoriesTable = 'other_initiative_categories';

	public function __construct(){
		parent::__construct();
	}

	public function get_current_blood_requirement($num){
		$defultBloodReqCount = $num;

		$this->db->select($this->bloodRequirement.'.*, countries.country as country_name, states.state as state_name, cities.city as city_name, blood_donation.donor_list_id as donor_id');
		$this->db->join('countries', $this->bloodRequirement.'.country = countries.id', 'left');
		$this->db->join('states', $this->bloodRequirement.'.state = states.id', 'left');
		$this->db->join('cities', $this->bloodRequirement.'.city = cities.id', 'left');
		$this->db->join('blood_donation', $this->bloodRequirement.'.id = blood_donation.blood_requirements_id', 'left');
		$this->db->order_by('added_at', 'DESC');
		$this->db->where('status !=', '0');
		$this->db->limit($defultBloodReqCount);
		//$this->db->group_by($this->bloodRequirement.'.id');
		$data = $this->db->get($this->bloodRequirement)->result_array();

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

	public function get_other_initiative_categories_list($num=null){

		$this->db->select($this->othInitiativeCategoriesTable.'.*');
		$this->db->limit($num);
		$data = $this->db->get($this->othInitiativeCategoriesTable);

		return $data->result();
	}

	public function get_other_initiatives_list($num=null){

		$this->db->select($this->othInitiativesTable.'.*');
		$this->db->order_by('priority', 'DESC');
		$this->db->where('priority !=', '0');
		$this->db->limit($num);
		$data = $this->db->get($this->othInitiativesTable);

		return $data->result();
	}
	
}
// end of file
