<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function getDonorData(){
		$qry = $this->db->get('donor_list');
		return $qry->result();
	}


}
// end of file
