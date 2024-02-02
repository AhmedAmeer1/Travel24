<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ListCt extends CI_Controller {	
	public function __construct() {
		parent::__construct();
	
		$this->load->model('ListCt_Model');	
 	}	
	public function index(){
		$data = $this->input->get();
	//	print_r($data);exit;
		$data['page'] = "Listpage";
		$data['page_title'] = "List Page";
		$data['data'] = "List page";
							$this->db->where('status',1);
		$data['vehicle'] = $this->db->get('vehicle')->result();
		//echo "<pre>";print_r($data['vehicle']);exit;
		$this->load->view('listView', $data);
	}
 
}
?>