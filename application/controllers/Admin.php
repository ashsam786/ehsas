<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

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
		if($this->require_role('admin')){
			ddd('Admin');
		} else{
			ddd('NOt authorised');
		}
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
		if($this->require_role('admin')){
			//$data['donors'] = $this->admin_model->getDonorData();
			$data['title'] = 'Ehsas | Donor list';
			$this->load->view('template/header', $data);
			$this->load->view('viewdata', $data);
			$this->load->view('template/footer', $data);
		} else{
			die('Sorry you are not authorised!');
		}
	
	}

	public function blooddonation(){
		if($this->require_role('admin')){
			$data['title'] = 'Blood Requirement | '.MAIN_TITLE;
			$data['pageHeaderType'] = 'components-page';
			$data['requirement_list'] = $this->admin_model->get_blood_requirement_list();
			
			$this->load->view('template/header_main', $data);
			$this->load->view('admin/bloodrequirement_list', $data);
			$this->load->view('template/footer_main', $data);
		} else{
			die('Sorry you are not authorised!');
		}
	}

	public function viewdonors(){
		if($this->require_role('admin')){
			$uriData =  $this->uri->segment(3);
			$donor_id_array = explode(',', $uriData);

			$data['title'] = 'Admin donor list | Ehsas ek zindagi bachane ka';
			
			$data['donor_list'] = $this->admin_model->getDonorListByIdArray($donor_id_array);

			$this->load->view('template/header_main', $data);
			$this->load->view('admin/donorlist', $data);
			$this->load->view('template/footer_main', $data);		
		} else{
			die('Sorry you are not authorised!');
		}	
	}

	public function donor_list() {
		if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
		{
	        $results = $this->admin_model->get_donor_list();
	        echo json_encode($results);
		} else {
		    show_404();
		} 		
  	}
}
