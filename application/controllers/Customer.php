<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/London');
		$this->load->model('Customer_model');
        if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
        if($this->session->userdata['user_type'] != 1){
            redirect(base_url('Dashboard'));
        }
    
 	}

    public function addCustomerUser(){
        $template['page'] = 'Customer/customer_add';
        $template['pTitle'] = "Add New Customer";
        $template['pDescription'] = "Create New Customer";
        $template['menu'] = "Customer Management";
        $template['smenu'] = "Add Customer";
        $this->load->view('template',$template);
    }
    
    public function listCustomerUsers(){
        $template['page'] = 'Customer/customer_list';
        $template['pTitle'] = "View Customers";
        $template['pDescription'] = "View and Manage Customers"; 
        $template['menu'] = "Customer Management";
        $template['smenu'] = "View Customers";
        $template['customerData'] = $this->Customer_model->get_customer();
        $this->load->view('template',$template);
    }

    public function createCustomer(){
        $err = 0;
        $errMsg = '';
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(!isset($_POST) || empty($_POST)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/addCustomerUser'));
        }
        if($err == 0 && (!isset($_POST['fullname']) || empty($_POST['fullname']))){
            $err = 1;
            $errMsg = 'Provide the Name';
        }
        else if($err == 0 && (!isset($_POST['email']) || empty($_POST['email']))){
            $err = 1;
            $errMsg = 'Provide an Email';
        }
        else if($err == 0 && (!isset($_POST['phone_no']) || empty($_POST['phone_no']))){
            $err = 1;
            $errMsg = 'Provide a Phone Number';
        }
        else if($err == 0 && (!isset($_POST['district']) || empty($_POST['district']))){
            $err = 1;
            $errMsg = 'Provide District';
        }
        else if($err == 0 && (!isset($_POST['password']) || empty($_POST['password']))){
            $err = 1;
            $errMsg = 'Provide password';
        }
        else if($err == 0 && (!isset($_FILES['image']) || empty($_FILES['image']))){
            $err = 1;
            $errMsg = 'Provide Profile Picture';
        }
        $_POST['password'] = md5($_POST['password']);
        $_POST['image'] = '';
        if($err == 0){
            $config = set_upload_service("assets/uploads/services");
            $this->load->library('upload');
            $config['file_name'] = time()."_".$_FILES['image']['name'];
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $err = 1;
                $errMsg = $this->upload->display_errors();
            }else{
                $upload_data = $this->upload->data();
                $_POST['image'] = $config['upload_path']."/".$upload_data['file_name'];
            }
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/addCustomerUser'));
        }
        
        $status = $this->Customer_model->createCustomer($_POST);

        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'User Created';

            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/listCustomerUsers'));
        }else if($status == 2){
            $flashMsg['message'] = 'Email ID already in use.';
        }else if($status == 3){
            $flashMsg['message'] = 'Phone Number already in use.';
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Customer/addCustomerUser'));
    }

    public function getCustomerData(){
        $return_arr = array('status'=>'0');
        if(!isset($_POST)||empty($_POST)||!isset($_POST['customer_id'])||empty($_POST['customer_id'])){
            echo json_encode($return_arr);exit;
        }
        $customer_id = decode_param($_POST['customer_id']);
        $customer_data = $this->Customer_model->get_customer(array('customer_id'=>$customer_id));
        if(!empty($customer_data)){
            $return_arr['status'] = 1;
            $return_arr['customer_data'] = $customer_data;
        }
        echo json_encode($return_arr);exit;
    }

    function editCustomer($customer_id = ''){
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($customer_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/listCustomerUsers'));
        }
        $template['page'] = 'Customer/customer_add';
        $template['menu'] = "Customer Management";
        $template['smenu'] = "Edit Customer";
        $template['pDescription'] = "Edit Customer Details";
        $template['pTitle'] = "Edit Customer";
        $template['customer_id'] = $customer_id;
        $customer_id = decode_param($customer_id);
        $template['customer_data'] = $this->Customer_model->get_customer(array('customer_id'=>$customer_id));
        $this->load->view('template',$template);
    }

    function updateCustomer($customer_id = ''){
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($customer_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/listCustomerUsers'));
        }
        $customerIdDec = decode_param($customer_id);
        $err = 0;
        $errMsg = '';
        if(!isset($_POST) || empty($_POST)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/addCustomerUser'));
        }
        if($err == 0 && (!isset($_POST['fullname']) || empty($_POST['fullname']))){
            $err = 1;
            $errMsg = 'Provide a Full Name';
        }

        else if($err == 0 && (!isset($_POST['email']) || empty($_POST['email']))){
            $err = 1;
            $errMsg = 'Provide an Email ID';
        }
        else if($err == 0 && (!isset($_POST['phone_no']) || empty($_POST['phone_no']))){
            $err = 1;
            $errMsg = 'Provide a Phone Number';
        }
        
        else if($err == 0 && (!isset($_POST['district']) || empty($_POST['district']))){
            $err = 1;
            $errMsg = 'Provide a district';
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/editCustomer/'.$customer_id));
        }
        $config = set_upload_service("assets/uploads/services");
        $this->load->library('upload');
        $config['file_name'] = time()."_".$_FILES['image']['name'];
        $this->upload->initialize($config);
        if($this->upload->do_upload('image')){
            $upload_data = $this->upload->data();
            $_POST['image'] = $config['upload_path']."/".$upload_data['file_name'];
        }
        
        $status = $this->Customer_model->updateCustomer($customerIdDec,$_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'User Details Updated';

            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/listCustomerUsers'));
        }else if($status == 2){
            $flashMsg['message'] = 'Email ID already in use.';
        }else if($status == 3){
            $flashMsg['message'] = 'Phone Number already in use.';
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Customer/editCustomer/'.$customer_id));
    }

   function changeStatus($customer_id = '',$status = '1'){
    
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($customer_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Customer/listCustomerUsers'));
        }
        $customer_id = decode_param($customer_id);
       // print_r($customer_id);exit;
        $status = $this->Customer_model->changeStatus($customer_id,$status);
        if(!$status){
            $this->session->set_flashdata('message',$flashMsg);
        }
        redirect(base_url('Customer/listCustomerUsers'));
    }
    public function payType(){
       
            $template['page'] = 'payType';
            $template['menu'] = 'Pay Type Management';
            $template['smenu'] = 'View Pay Type';
            $template['pTitle'] = "View Payment Type  ";
            $template['pDescription'] = "View and Manage Payment Type";
            $template['pay_type'] = $this->db->get('payment_types')->result();
            $this->load->view('template',$template);
      
    }
    public function change_payment_tye_status(){
        $status = $_POST['status'];
        $id     = $_POST['id'];
        $this->db->where('id',$id);
        $this->db->set('status',$status);
        $this->db->update('payment_types');
    }
}
?>