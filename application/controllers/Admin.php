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
		$this->lang->load('form_errors', 'english');
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
		//if($this->require_role('admin')){
			//$data['donors'] = $this->admin_model->getDonorData();
			$data['title'] = 'Ehsas | Donor list';

			$data['admin_logout'] = '<li><a href="'. base_url("admin/logout").' ">Admin Logout</a></li>';
			if($this->require_role('admin')){
				$data['can_edit'] = true;
			}

			$this->load->view('template/header', $data);
			$this->load->view('viewdata', $data);
			$this->load->view('template/footer', $data);
		/*} else{
			die('Sorry you are not authorised!');
		}*/
	
	}

	public function blooddonation(){
		if($this->require_role('admin')){
			$data['title'] = 'Blood Requirement | '.MAIN_TITLE;
			$data['pageHeaderType'] = 'components-page';
			$data['requirement_list'] = $this->admin_model->get_blood_requirement_list();
			
			$data['can_edit'] = true;
			$data['admin_logout'] = '<li><a href="'. base_url("admin/logout").' ">Admin Logout</a></li>';

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
		$data['admin_logout'] = '<li><a href="'. base_url("admin/logout").' ">Admin Logout</a></li>';			
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

	public function logout()
	{
	    $this->authentication->logout();
	 
	    // Set redirect protocol
	    $redirect_protocol = USE_SSL ? 'https' : NULL;
	 
	    redirect( site_url( LOGIN_PAGE . '?logout=1', $redirect_protocol ) );
	}

	public function donor(){
		if($this->require_role('admin')){
			$action =  $this->uri->segment(3);
			$id =  $this->uri->segment(4);
			if(!$action || !$id){
				show_404();
			}

			$this->load->model('donor_model');
			$data['title'] = 'Ehsas ek zindagi bachane ka | Edit user profile';

			if($action == 'edit'){	
				$data['donor'] = $this->donor_model->getDonorById($id);
				$data['hospital_list'] = $this->donor_model->get_hospital_list_array();
				$data['country_list'] = $this->donor_model->get_country_list();
				
				$data['stateList'] = [];
				$data['cityList'] = [];
				if($data['donor'] && !empty($data['donor']->country)){
					$data['stateList'] = json_decode(file_get_contents(base_url("getStates?country_id={$data['donor']->country}")));
				}

				if($data['donor'] && !empty($data['donor']->state)){
					$data['cityList'] = json_decode(file_get_contents(base_url("getCities?state_id={$data['donor']->state}")));
				}

				$data['donor']->days_passed = $data['donor']->last_time_donated ? getDaysFromToday($data['donor']->last_time_donated) : '';

				$this->load->view('template/header', $data);
				$this->load->view('admin/donor/edit', $data);
				$this->load->view('template/footer', $data);
			} elseif($action == 'delete'){
				$response = $this->donor_model->deleteDonorById($id);
				if($response['result']){
					$this->session->set_flashdata('success-message', $response['msg']);
				} else{
					$this->session->set_flashdata('alert-message', $response['msg']);
				}
				redirect($this->agent->referrer());
			}
		} else{
			die('Sorry you are not authorised!');
		}
	}

	public function updateDonor(){
		$this->load->model('donor_model');
		if(!$this->input->post()){
			show_404();
		}
		$donor_id = base64_decode($this->input->post('donor'));

		$res = $this->admin_model->save_donor_form();
		$class = $res['result'] ? 'alert-success' : 'alert-danger';
		$alert_message = '';
		foreach($res['msg'] as $i => $v){
			$alert_message .= '<p>'. $v .'</p>';
		}

		$alert_message = '<div class="alert '. $class .'">'. $v .'</div>';
		$this->session->set_flashdata('alert-message', $alert_message);
		redirect(base_url('admin/donor/edit/'.$donor_id), 'refresh');
	}

}
