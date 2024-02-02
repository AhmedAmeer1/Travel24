<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/London');
		
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
 	}
	
	function index() {
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(base_url('Login'));
	}
}
?>