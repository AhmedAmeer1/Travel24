<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Settings_model');
		$this->load->model('Dashboard_model');
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
		if($this->session->userdata['user_type'] != 1){
			$flashMsg = array('message'=>'Access Denied You don\'t have permission to access this Page',
							  'class'=>'error');
			$this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Dashboard'));
		}
 	}
	
	public function index() {

		$template['page'] = 'Settings/viewSettings';
		$template['menu'] = "Site Settings";
		$template['sub_menu'] = "Change Settings";
        $template['page_desc'] = "Edit or View Settings";
        $template['page_title'] = "Settings";
		$template['data'] = $this->Settings_model->settings_viewing();
		$this->load->view('template',$template);
	}

	public function change_settings(){
		$flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
		if(!isset($_POST) || empty($_POST)){
			$this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Settings'));
		}
		if(isset($_FILES['site_logo']) && !empty($_FILES['site_logo'])){
	        $config = set_upload_service("assets/uploads/services");
	        $this->load->library('upload');
	        $config['file_name'] = time()."_".$_FILES['site_logo']['name'];
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('site_logo')){
	        	$upload_data = $this->upload->data();
	            $_POST['site_logo'] = $config['upload_path']."/".$upload_data['file_name'];
	        }
	    }
	    if(isset($_FILES['fav_icon']) && !empty($_FILES['fav_icon'])){
	        $config = set_upload_service("assets/uploads/services");
	        $this->load->library('upload');
	        $config['file_name'] = time()."_".$_FILES['fav_icon']['name'];
	        $this->upload->initialize($config);
	        if($this->upload->do_upload('fav_icon')){
	        	$upload_data = $this->upload->data();
	            $_POST['fav_icon'] = $config['upload_path']."/".$upload_data['file_name'];
	        }
	    }
        $status = $this->Settings_model->update_settings($_POST);
 		if($status){
 			$flashMsg['class'] = 'success'; 
 			$flashMsg['message'] = 'Settings Successfully Updated..!';
 			$settings = $this->Settings_model->settings_viewing();
 			if(!empty($settings)){
 				$this->session->set_userdata('settings', $settings);
 			}
 		}
 		$this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Settings'));
	}
}
?>