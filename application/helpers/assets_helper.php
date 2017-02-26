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

function ddd($data){
	echo '<pre>';
	print_r($data); 
	echo '<pre>'; die;
}