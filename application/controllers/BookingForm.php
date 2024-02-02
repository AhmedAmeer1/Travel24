<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookingForm extends CI_Controller {	
	public function __construct() {
		parent::__construct();
	
		$this->load->model('BookingForm_Model');	
 	}	
	public function index(){
		$home_template['page'] = "Booking Form Page";
		$home_template['page_title'] = "Booking Form Page";
		$home_template['data'] = "Booking Form Page";
		$home_template['setting'] = $this->db->get('settings')->row();
		$this->load->view('BookingForm', $home_template);
	}
 
}
?>