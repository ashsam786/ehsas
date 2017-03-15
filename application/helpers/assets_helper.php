<?php if (!defined('BASEPATH'))    exit('No direct script access allowed');
 
function assets_url() {
    return base_url();
}

function getCurrentUrl(){
	return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function getDaysFromToday($date){
	return floor((time() - strtotime($date)) / (60 * 60 * 24));
}


function get_country_list(){
	$CI =& get_instance();
	$data =  $CI->db->get('countries');
	return $data->result();
}


function get_hospital_list_array(){
	$CI =& get_instance();	
	$CI->db->select('nearby_hospital');
	$data = $CI->db->get('hospital_list');
	$data = $data->result_array();
	
	$hospital_array = [];
	foreach($data as $i => $v){
		$hospital_array[] = $v['nearby_hospital'];
	}
	
	return $hospital_array;
}

function validateDate($date){
    $CI =& get_instance();	
	$data = $CI->db->get_where('cms', ['page' => $date]);
	$data = $data->result_array();
}

function get_page_detail($page){
    $d = DateTime::createFromFormat('m/d/Y', $date);
    return $d && $d->format('m/d/Y') === $date;
}

function ddd($data){
	echo '<pre>';
	print_r($data); 
	echo '<pre>'; die;
}