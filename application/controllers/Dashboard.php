<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/London');
		$this->load->model('Dashboard_model');
		
		
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
 	}
	
	public function index() {
		$template['page'] = 'Dashboard';
        $template['page_desc'] = "Control Panel";
        $template['page_title'] = "Dashboard";
		$template['totalorder'] = $this->Dashboard_model->gettotalvechicle();
		$template['totalcustomers'] = $this->Dashboard_model->gettotalcustomers();
		$template['totalbooking'] = $this->Dashboard_model->gettotalbooking();
		$template['totalcompany'] = $this->Dashboard_model->gettotalcompany();
		$this->load->view('template',$template);
	}
	public function getOrderSalesReportCount(){
		$result = $this->Dashboard_model->getSalesReportCount();
		if(count($result) > 0){	
			echo $result;
		}else{
			echo 1;
		}
	}


}
?>