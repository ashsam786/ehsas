<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Register controller
	 * Author Amir Samad Hanga
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('register_model');
	}


}
