<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Other_initiatives_model extends CI_Model{
	private $table = 'other_initiatives';
	private $initiative_category = 'other_initiative_categories';

	public function __construct(){
		parent::__construct();
	}

	public function getInitiativesByCategory($category = null){

		$this->db->select('init.*, cat.name as category, cat.description as category_description, cat.image as category_image, cat.slug as category_slug');
		$this->db->join($this->table.' as init', 'cat.id = init.category_id', 'left');
		$this->db->order_by('init.priority', 'ASC');
		$this->db->where('init.priority !=', '0');
		if($category != null){
			$this->db->where(['init.priority !=' => '0', 'cat.slug' => $category]);
		}

		//return $data = $this->db->get($this->table.' as init')->result_array();
		$result = $this->db->get($this->initiative_category.' as cat')->result_array();

		$data = [];
		foreach($result as $i => $v){
			if(!array_key_exists('id', $data) AND !array_key_exists('category', $data)){
				$data = ['id' => $v['category_id'], 'category' => $v['category'], 'description' => $v['category_description'], 'image' => $v['category_image'], 'category_slug' => $v['category_slug'], 'data' => []];	
			}

			$sub_array = ['id' => $v['id'], 'name' => $v['name'], 'description' => $v['description'], 'email' => $v['email'], 'address' => $v['address'], 'image' => $v['image'], 'url' => $v['url']];
			$data['data'][$i] =  $sub_array;
		}

		return $data;
	}
	
}
// end of file
