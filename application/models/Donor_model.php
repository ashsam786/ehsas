<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class donor_model extends CI_Model{
	private $table = 'donor_list';

	public function __construct(){
		parent::__construct();
	}
	
	public function getDonorByContact($contact){
		try{
			$qry = $this->db->get_where($this->table, ['contact' => $contact]);
			if($qry->num_rows() != 1){
				throw new Exception('Invalid contact');
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
				throw new Exception('Please enter your registered mobile number');
			}

			if(null == $this->input->post('f1-password') || $this->input->post('f1-password') == ''){
				throw new Exception('Please enter your password');
			}

			$userId = $this->input->post('f1-userId');
			$password = $this->input->post('f1-password');
			$where = ['contact' => $userId, 'pass' => md5($password)];

			$qry = $this->db->get_where('donor_list', $where);

			if($qry->num_rows() != 1){
				throw new Exception('Please enter valid registerd mobile number and password');
			}
			$dbData = $qry->row();

			$this->session->donor_id = $dbData->id;
			$this->session->donor_contact = $dbData->contact;
			$this->session->donor_name = $dbData->name;

			$data = ['result' => true, 'msg' => 'Login successful'];

		} catch(Exception $e){
			$data = ['result' => false, 'msg' => $e->getMessage()];
		}

		return $data;
	}


}
// end of file
