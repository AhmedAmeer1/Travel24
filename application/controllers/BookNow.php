<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BookNow extends CI_Controller {


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

	// debug_log(" -----home_template  --------- ");
	// 		debug_log($home_template);

        $this->load->view('bookNow',$home_template);
    }






public function Search()
	{


		$post_data = $this->input->post();

		if (count($post_data) == 0) {
			redirect($this->index);
		}
		$latitudeFrom = $post_data['sourceLat'];
		$longitudeFrom = $post_data['sourceLon'];

		$latitudeTo = $post_data['destLat'];
		$longitudeTo = round($post_data['destLong'], 8);

		$special_location_id = $this->Index_Model->is_special_location($post_data['source'], $post_data['destination']);

		if (isset($special_location_id)) {
			$found_location = "true";
		} else {
			$found_location = "false";
		}


		$data['page'] = "Listpage";
		$data['page_title'] = "List Page";
		$data['post_data'] = $post_data;
		$data['total_way_points'] = $post_data['total_way_points'];
		$this->db->where('status', 1);
		$this->db->order_by('sort_order', "ASC");
		$data['vehicle_type'] = $this->db->get('vehicle_type')->result();
		$data['way_points'] = array();
		// array_push($data['way_points'],$post_data['source']);
		for ($i = 1; $i <= $data['total_way_points']; $i++) {
			if (($post_data['wayPoint-' . $i] != $post_data['source']) && ($post_data['wayPoint-' . $i] != $post_data['destination'])) {
				//echo "if".$post_data['source']."=".$post_data['wayPoint-'.$i];
				array_push($data['way_points'], $post_data['wayPoint-' . $i]);
			}
			//  else{
			// 	echo "else".$post_data['source']."=".$post_data['wayPoint-'.$i];
			//  }
		}
		//array_push($data['way_points'],$post_data['destination']);

		$this->db->where('v.status', 1);
		$this->db->order_by('vt.sort_order', 'ASC');
		$this->db->join('vehicle_type vt', 'vt.id=v.vehicle_type');
		$data['vehicle'] = $this->db->get('vehicle v')->result();
		$data['max_passenger'] = 0;
		$data['max_suit_case'] = 0;
		foreach ($data['vehicle'] as $new) {
			if ($new->noOfPassengers >  $data['max_passenger']) {
				$data['max_passenger'] = $new->noOfPassengers;
			}
			if ($new->noOfSuitcases >   $data['max_suit_case']) {
				$data['max_suit_case']  = $new->noOfSuitcases;
			}
		}
		if ($found_location == "true") {
			$data['special_location'] = $special_location_id;
		} else {
			$data['special_location'] = 0;
		}
		$_SESSION["source"] = $post_data['source'];
		$_SESSION["destination"] = $post_data['destination'];
		$_SESSION["total_way_points"] = (!empty($data['total_way_points']) ? $data['total_way_points'] : 0);
		$_SESSION["way_points"] = $data['way_points'];


		$data['all_points'] =  array();
		$data['all_points'][] = $post_data['source'];
		if ($_SESSION["total_way_points"] != 0) {
			foreach ($data['way_points'] as $new) {
				$data['all_points'][] = $new;
			}
		}

		$data['all_points'][] = $post_data['destination'];
		//echo "<pre>";print_r($data['all_points']);exit;
		$data['setting'] = $this->db->get('settings')->row();

		$data['payment_types'] = $this->db->get('payment_types')->result();
		$this->load->view('listView', $data);
	}












    

}
?>