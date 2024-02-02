<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('CompanyModel');
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url('Login'));
        }
        if($this->session->userdata['user_type'] != 1){
            redirect(base_url('Dashboard'));
        }
    }
    
    public function addNewCompany(){
        $template['page'] = 'Company/company_add';
        $template['pTitle'] = "Add New Company";
        $template['pDescription'] = "Create New Company";
        $template['menu'] = "Company Management";
        $template['smenu'] = "Add Company";
        $this->load->view('template',$template);
    }
    
    public function listCompany(){
        $template['page'] = 'Company/company_list';
        $template['pTitle'] = "View Company";
        $template['pDescription'] = "View and Manage Company"; 
        $template['menu'] = "Company Management";
        $template['smenu'] = "View Company";
        $template['company_data'] = $this->CompanyModel->getCompany();
       // print_r($template['company_data']);exit;
        $this->load->view('template',$template);
    }
    
    public function createCompany(){
        $err = 0;
        $errMsg = '';
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(!isset($_POST) || empty($_POST)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/addNewCompany'));
        }
        if($err == 0 && (!isset($_POST['company_name']) || empty($_POST['company_name']))){
            $err = 1;
            $errMsg = 'Provide a Company Name';
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/addNewCompany'));
        }
        
        $status = $this->CompanyModel->createCompany($_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'New Vechicle Company Created';
            
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/listCompany'));
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Company/addNewCompany'));
    }
    
    public function getCityData(){
        $return_arr = array('status'=>'0');
        if(!isset($_POST)||empty($_POST)||!isset($_POST['city_id'])||empty($_POST['city_id'])){
            echo json_encode($return_arr);exit;
        }
        $city_id = decode_param($_POST['city_id']);
        $city_data = $this->City_model->getCities($city_id);
        if(!empty($city_data)){
            $return_arr['status'] = 1;
            $return_arr['city_data'] = $city_data;
        }
        echo json_encode($return_arr);exit;
    }
    public function editCompany($company_id){
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($company_id) || !is_numeric($company_id = decode_param($company_id))){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/listCompany'));
        }
        $template['page'] = 'company/company_add';
        $template['menu'] = 'Company Management';
        $template['smenu'] = 'Edit Company';
        $template['pTitle'] = "Edit Company";
        $template['pDescription'] = "Update Company Data";
        $template['company_id'] = $company_id;
        $template['company_data'] =  $this->CompanyModel->getCompany($company_id);
       // print_r($template['company_data']);exit;
        $this->load->view('template',$template);
    }
    
    function updateCompany($company_id = ''){
       
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($company_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/listCompany'));
        }
        $err = 0;
        $errMsg = '';
        if(!isset($_POST) || empty($_POST)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/addNewCompany'));
        }
        if($err == 0 && (!isset($_POST['company_name']) || empty($_POST['company_name']))){
            $err = 1;
            $errMsg = 'Provide a Company name';
        } 
        //print_r($_POST);exit;
        $status = $this->CompanyModel->updateCompany($company_id,$_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'Company Details Updated';
            
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/listCompany'));
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Company/editCompany/'.$company_id));
    }
    
    function changeStatus($company_id = '',$status = '1'){
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($company_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Company/listCompany'));
        }
        $company_id = decode_param($company_id);
        $status = $this->CompanyModel->changeStatus($company_id,$status);
        if(!$status){
            $this->session->set_flashdata('message',$flashMsg);
        }
        redirect(base_url('Company/listCompany'));
    }

    public function getCompanyData(){
        $return_arr = array('status'=>'0');
        if(!isset($_POST)||empty($_POST)||!isset($_POST['company_id'])||empty($_POST['company_id'])){
            echo json_encode($return_arr);exit;
        }
        $company_id = decode_param($_POST['company_id']);
        $company_data = $this->CompanyModel->getCompanyData($company_id);
        if(!empty($company_data)){
            $return_arr['status'] = 1;
            $return_arr['company_data'] = $company_data;
        }
        echo json_encode($return_arr);exit;
    }
    
}
?>
