<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	private $table = 'donor_list';

	public function __construct(){
		parent::__construct();
	}
	
/*	public function getDonorData(){
		$qry = $this->db->get('donor_list');
		return $qry->result();
	}*/

	public function get_donor_list(){
		$aColumns = array(
			//'id',
			'days_passed',
			'last_time_donated',
			'name',
			'blood_group',
			'gender',
			'contact',
			'alternate_contact',
			'email',
			'nearby_hospital',
			'city',
			'state',
			'country',
			'address',
			'how_you_know_us'
        );

		$sColumns = array(
			'dl.last_time_donated',
			'dl.name',
			'dl.blood_group',
			'dl.gender',
			'dl.contact',
			'dl.alternate_contact',
			'dl.email',
			'h.nearby_hospital',
			'ci.city',
			's.state',
			'c.country',
			'dl.address',
			'dl.how_you_know_us'			
		);

         $sIndexColumn = "id";

         /* Total data set length */
         $iTotal = $this->db->count_all_results($this->table);

        /*
         * Paging
        */
        $sLimit = "";
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayStart) . ", " .intval($iDisplayLength);
        }

		$uri_string = $_SERVER['QUERY_STRING'];
        $uri_string = preg_replace("/%5B/", '[', $uri_string);
        $uri_string = preg_replace("/%5D/", ']', $uri_string);

        $get_param_array = explode("&", $uri_string);
        $arr = array();
        foreach ($get_param_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            $arr[$explode[0]] = $explode[1];
        }

		$index_of_columns = strpos($uri_string, "columns", 1);		
        $index_of_start = strpos($uri_string, "start");
        $uri_columns = substr($uri_string, 7, ($index_of_start - $index_of_columns - 1));
        $columns_array = explode("&", $uri_columns);
        $arr_columns = array();
        foreach ($columns_array as $value) {
            $v = $value;
            $explode = explode("=", $v);
            if (count($explode) == 2) {
                $arr_columns[$explode[0]] = $explode[1];
            } else {
                $arr_columns[$explode[0]] = '';
            }
        }

        /*
         * Ordering
         */
        $sOrder = "ORDER BY ";
        $sOrderIndex = $arr['order[0][column]'];
        $sOrderDir = $arr['order[0][dir]'];
        $bSortable_ = $arr_columns['columns[' . $sOrderIndex . '][orderable]'];
        if ($bSortable_ == "true") {
            $sOrder .= $sColumns[$sOrderIndex] .
                    ($sOrderDir === 'asc' ? ' asc' : ' desc');
        }

        /*
         * Filtering
         */
        $sWhere = "";
        $sSearchVal = $arr['search[value]'];
        if (isset($sSearchVal) && $sSearchVal != '') {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($sColumns); $i++) {
                $sWhere .= $sColumns[$i] . " LIKE '%" . $this->db->escape_like_str($sSearchVal) . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

         /* Individual column filtering */
        $sSearchReg = $arr['search[regex]'];
        for ($i = 0; $i < count($sColumns); $i++) {
            $bSearchable_ = $arr['columns[' . $i . '][searchable]'];
            if (isset($bSearchable_) && $bSearchable_ == "true" && $sSearchReg != 'false') {
                $search_val = $arr['columns[' . $i . '][search][value]'];
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $sColumns[$i] . " LIKE '%" . $this->db->escape_like_str($search_val) . "%' ";
            }
        }

        $sQuery = "SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $sColumns)) . "
        FROM $this->table as dl 
        LEFT OUTER JOIN cities as ci ON dl.city = ci.id 
        LEFT OUTER JOIN states as s ON dl.state = s.id 
        LEFT OUTER JOIN countries as c ON dl.country = c.id 
        LEFT OUTER JOIN hospital_list as h ON dl.nearby_hospital = h.id
        $sWhere
        $sOrder
        $sLimit";

        $rResult = $this->db->query($sQuery);
 
		 /* Data set length after filtering */
        $sQuery = "SELECT FOUND_ROWS() AS length_count";
        $rResultFilterTotal = $this->db->query($sQuery);
        $aResultFilterTotal = $rResultFilterTotal->row();
        $iFilteredTotal = $aResultFilterTotal->length_count;
 
        /*
         * Output
         */
        $sEcho = $this->input->get_post('draw', true);
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $iTotal,
            "recordsFiltered" => $iFilteredTotal,
            "data" => array()
        );
 
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aColumns as $col) {
            	if($col == 'last_time_donated'){
            		$days = floor((time() - strtotime($aRow[$col])) / (60 * 60 * 24));
            		$class = ($days > UNFIT_DONOR_PERIOD) ? 'fitDonor' : 'unFitDonor';
            		$class .= ' daysPassed';
            		$row[] = '<span class="'. $class .'">'. $days .'</span>';
            	}
            	if($col == 'days_passed') continue;
            	$row[] = $aRow[$col];
            }
            $output['data'][] = $row;
        }
 
        return $output;
	}


    public function get_blood_requirement_list($num = null){
        $this->db->order_by('added_at', 'DESC');
        if($num != null){
            $this->db->limit($num);
        }
        
        $where = ['status !=' => '0'];
        
/*      if($this->session->has_userdata('donor_id')){
            $where['blood_donation.donor_list_id'] = $this->session->donor_id;
        }*/

        $this->db->select('blood_requirements.*, countries.country as country_name, states.state as state_name, cities.city as city_name, blood_donation.donor_list_id as donor_id');
        $this->db->join('countries', 'blood_requirements.country = countries.id', 'left');
        $this->db->join('states', 'blood_requirements.state = states.id', 'left');
        $this->db->join('cities', 'blood_requirements.city = cities.id', 'left');
        $this->db->join('blood_donation', 'blood_requirements.id = blood_donation.blood_requirements_id', 'left');

        $data = $this->db->get_where('blood_requirements', $where)->result_array(); 

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


   public function getDonorListByIdArray($donorIdArray = []){
        try{
            $this->db->where('donor_list.status !=', 0);
            $this->db->where_in('donor_list.id', $donorIdArray);

            $this->db->select('donor_list.*, countries.country as country_name, states.state as state_name, cities.city as city_name');
            $this->db->join('countries', 'donor_list.country = countries.id', 'left');
            $this->db->join('states', 'donor_list.state = states.id', 'left');
            $this->db->join('cities', 'donor_list.city = cities.id', 'left');
            $qry = $this->db->get($this->table);

            if($qry->num_rows() <= 0){
                throw new Exception($this->lang->line('error_search_return_null'));
            }
            return ['result' => true, 'data' => $qry->result()];
        } catch(Exception $e){
            return ['result' => false, 'msg' => $e->getMessage()];
        }
   }    
}
// end of file
