<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VehicleType extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Europe/London');
        $this->load->model('VehicleTypeModel');
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url('Login'));
        }
        
    }
    
    public function addVehicleType(){
        $template['page'] = 'VehicleType/addVehicleType';
        $template['pTitle'] = "Add Vehicle Type";
        $template['pDescription'] = "Add vehicle Type"; 
        $template['menu'] = "Vehicle Type Management";
        $template['smenu'] = "Add Vehicle Type ";
        $this->load->view('template',$template);
    }
    
    public function viewVehicleType(){
        $template['page'] = 'VehicleType/viewVehicleType';
        $template['menu'] = 'Vehicle Type Management';
        $template['smenu'] = 'View Vehicle Type';
        $template['pTitle'] = "View Vehicle Type";
        $template['pDescription'] = "View and Manage Vehicle Type";
        $template['vehicle_type'] = $this->VehicleTypeModel->getVehicle();
        $this->load->view('template',$template);
    }
   public function changeStatus($id,$status = '1'){
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/viewVehicle'));
        }
        $id = decode_param($id);
        $status = $this->VehicleTypeModel->changeStatus($id,$status);
        if(!$status){
            $this->session->set_flashdata('message',$flashMsg);
        }
        redirect(base_url('VehicleType/viewVehicleType'));
    }
    
    public function createVehicleType(){
        $err = 0;
        $errMsg = '';
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(!isset($_POST) || empty($_POST)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/addVehicleType')); 
        }
        else if($err == 0 && (!isset($_POST['type']) || empty($_POST['type']))){
            $err = 1;
            $errMsg = 'Provide a vehicle type';
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/addVehicleType'));
        }
        
        $status = $this->VehicleTypeModel->createVehicleType($_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'Vehicle Type added';
            
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/addVehicleType'));
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('VehicleType/addVehicleType'));
    }
    
    public function editVehicleType($id){
      //  print_r($id);exit;
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/addVehicleType'));
        }
        $template['page'] = 'VehicleType/addVehicleType';
        $template['menu'] = "vehicle Type Management";
        $template['smenu'] = "Edit vehicle Type";
        $template['pDescription'] = "Edit vehicle Type Details";
        $template['pTitle'] = "Edit Vehicle Type";
        $template['id'] = $id;
        $id = decode_param($id);
        $template['vehicle_type'] = $this->VehicleTypeModel->getVehicle($id);
        $this->load->view('template',$template);
    }
    
    
    public function updateVehicleType($id = ''){
        //print_r($id);exit;
        $err = 0;
        $errMsg = '';
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($id) || !isset($_POST) || empty($_POST) || !is_numeric(decode_param($id))){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/addVehicleType'));
        }else if($err == 0 && (!isset($_POST['type']) || empty($_POST['type']))){
            $err = 1;
            $errMsg = 'Provide a Vehicle Type';
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/editVehicleType'));
        }
        $status = $this->VehicleTypeModel->updateVehicle(decode_param($id),$_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'Vechicle  Type Details edited';
            
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('VehicleType/viewVehicleType'));
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('VehicleType/addVehicleType'));
    }
    public function getVehicleData(){
       $return_arr = array('status'=>'0');
        if(!isset($_POST)||empty($_POST)||!isset($_POST['id'])||empty($_POST['id'])){
            echo json_encode($return_arr);exit;
        }
        $id = decode_param($_POST['id']);
        $vehicle_data1 = $this->VehicleTypeModel->getVehicleData(array('id'=>$id));
        if(!empty($vehicle_data1)){
            $return_arr['status'] = 1;
            $return_arr['vehicle_data1'] = $vehicle_data1;
        }
        echo json_encode($return_arr);exit;
    }   

}
?>
