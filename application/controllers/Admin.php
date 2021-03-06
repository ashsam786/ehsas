<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
/*		//$data = $this->db->get('cities1');
		$data = $this->db->get('statelist');
		$data = $data->result();

		$list = [];
		foreach($data  as $i => $v){
			$s = trim($v->state);
			$c = trim($v->city_name);

			if(!isset($list[$s])){
				$list[$s] = [];
			}

			$list[$s][] = $c;
		}

		foreach($list as $i => $v){
			$d = ['country_id' => 1, 'state' => $i];
			$this->db->insert('states', $d);
			$state_id = $this->db->insert_id();
			$cityList = [];	
			foreach($v as $ind => $val){
				$cityList[] = ['city' => $val, 'state_id' => $state_id];
			}

			$this->db->insert_batch('cities', $cityList);
		}
//echo '<pre>'; print_r($i); echo '</pre><br>';			 die;
die('done!');*/
	}

	public function view(){
		//$data['donors'] = $this->admin_model->getDonorData();
		$data['title'] = 'Ehsas | Donor list';
		$this->load->view('template/header', $data);
		$this->load->view('viewdata', $data);
		$this->load->view('template/footer', $data);
	}

	public function donor_list() {
        $results = $this->admin_model->get_donor_list();
        echo json_encode($results);
  	}
}
