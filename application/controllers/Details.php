<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Details extends CI_Controller {	
	public function __construct() {
		parent::__construct();
	
		$this->load->model('Details_Model');	
 	}	
	public function index(){
		$home_template['page'] = "Detailspage";
		$home_template['page_title'] = "Details Page";
		$home_template['data'] = "Details page";
		$this->load->view('details', $home_template);
	}
 
}
?>