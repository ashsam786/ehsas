<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model{
	private $table = 'donor_list';
	private $bloodRequirement = 'blood_requirements';

	public function __construct(){
		parent::__construct();
	}

	public function get_current_blood_requirement($num){
		$defultBloodReqCount = $num;

		$this->db->select($this->bloodRequirement.'.*, countries.country as country_name, states.state as state_name, cities.city as city_name');
		$this->db->join('countries', $this->bloodRequirement.'.country = countries.id', 'left');
		$this->db->join('states', $this->bloodRequirement.'.state = states.id', 'left');
		$this->db->join('cities', $this->bloodRequirement.'.city = cities.id', 'left');
		$this->db->order_by('added_at', 'DESC');
		$this->db->where('status !=', '0');
		$this->db->limit($defultBloodReqCount);
		$data = $this->db->get($this->bloodRequirement);

		return $data->result();
	}
	
}
// end of file
