<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AirportTransfer extends CI_Controller {


 private $fleet_data;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/London');
		$this->load->model('Index_Model');
		$this->load->helper('cookie');
		$this->load->helper('custom_helper');
		$this->load->model('Review_Model');
		$this->load->config('fleet_data'); 
		  $this->fleet_data = $this->config->item('fleet_data'); // Get the data from the config file
	}

    public function index() {
      
	$this->session->sess_destroy();

		if (!isset($_SESSION)) {
			session_start();
		}

		/* === Language Translation [ Directory Listings ] === */
		/* === Common Homepage Supporting Methods === */
		$home_template['page'] = "Homepage";
		$home_template['title'] = $this->db->get('settings')->row('title');
		$home_template['data'] = "Home page";
		$home_template['result'] = $this->db->get('settings')->row();
		$this->db->join('vehicle_type vt', 'vt.id=v.vehicle_type');
		$home_template['fleet'] =  $this->db->get('vehicle v')->result();
  	    $home_template['fleet_data'] = $this->fleet_data;
		$this->load->model('Review_Model');
		$home_template['reviews'] =  $this->Review_Model->getAllReviews(1);
		$home_template['CustomerReviewData'] = $this->Review_Model->getReviewDetailsforAdmin();
			$home_template['payment_types'] = $this->db->get('payment_types')->result();

;

        $this->load->view('airportTransfer',$home_template);
    }
    

}
?>