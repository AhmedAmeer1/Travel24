<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Europe/London');
        $this->load->model('VehicleModel');
        $this->load->model('CompanyModel');
        $this->load->model('LocationModel');
        $this->load->helper('custom_helper');
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url('Login'));
        }
        
    }
    
    public function addVehicle(){
        $template['page'] = 'Vehicle/addVehicle';
        $template['pTitle'] = "Add Vehicle";
        $template['pDescription'] = "Add vehicle"; 
        $template['menu'] = "Vehicle Management";
        $template['smenu'] = "View vehicle";
        $template['company_data'] = $this->CompanyModel->getCompany();
        $template['vehicle_type'] =  $this->VehicleModel->getVehicleType();
        $template['locations'] = $this->LocationModel->get_locations();

        $this->load->view('template',$template);
    }
    
    public function viewVehicle(){
        $template['page'] = 'Vehicle/viewVehicle';
        $template['menu'] = 'Vehicle Management';
        $template['smenu'] = 'View Vehicle';
        $template['pTitle'] = "View Vehicle";
        $template['pDescription'] = "View and Manage Vehicle";
        $template['vehicle_data'] = $this->VehicleModel->getVehicle();
        $this->load->view('template',$template);
    }
   public function changeStatus($vehicle_id,$status = '1'){
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($vehicle_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/viewVehicle'));
        }
        $vehicle_id = decode_param($vehicle_id);
        $status = $this->VehicleModel->changeStatus($vehicle_id,$status);
        if(!$status){
            $this->session->set_flashdata('message',$flashMsg);
        }
        redirect(base_url('Vehicle/viewVehicle'));
    }
    
    public function createVehicle(){  


        $err = 0;
        $errMsg = '';
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(!isset($_POST) || empty($_POST)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/addVehicle')); 
        }else if($err == 0 && (!isset($_POST['title']) || empty($_POST['title']))){
            $err = 1;
            $errMsg = 'Provide a Title';
        }else if($err == 0 && (!isset($_POST['child_seat']) || empty($_POST['child_seat']))){
            $err = 1;
            $errMsg = 'Provide Number of Child seat(s)';
        } else if($err == 0 && (!isset($_FILES['vehicle_image']) || empty($_FILES['vehicle_image']))){
            $err = 1;
            $errMsg = 'Provide Vehicle Image';
        }
        $_POST['vehicle_image'] = '';
        if($err == 0){
            $config = set_upload_service("assets/uploads/services");
            $this->load->library('upload');
            $config['file_name'] = time()."_".$_FILES['vehicle_image']['name'];
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('vehicle_image')){
                $err = 1;
                $errMsg = $this->upload->display_errors();
            }
            else{
                $upload_data = $this->upload->data();
                $_POST['vehicle_image'] = $config['upload_path']."/".$upload_data['file_name'];
            }
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/addVehicle'));
        }

        

      //MILES RANGE (BASED ON THE MILES  SET THE PRICE )LOGIC 
        $total_mile_range = $_POST['total_mile_range'];
        if($total_mile_range > 0){
            $mile_set = array();
           
            for($i=1;$i<=$total_mile_range;$i++){
               $res = explode('-',$_POST['mile-range-'.$i]);
               unset($_POST['mile-range-'.$i]);
        
               $x = (object) [
                'from' => $res[0],
                'to' => $res[1],
                'single' => $res[2],
                'return' => $res[3]
            ];
            $mile_set[] = $x;

            }
        }
        unset($_POST['total_mile_range']);
        $_POST['mile_range'] = json_encode($mile_set);  



        //TIME RANGE (BASED ON THE TIME SET THE PRICE )LOGIC 
       $total_time_range = $_POST['total_time_range'];

        if($total_time_range > 0){
            $time_set = array();
           
            for($i=1;$i<=$total_time_range;$i++){
               $res = explode('-',$_POST['time-range-'.$i]);
               unset($_POST['time-range-'.$i]);
        
               $time_x = (object) [
                'from' => $res[0],
                'to' => $res[1],
                'single' => $res[2],
                'return' => $res[3]
            ];
            $time_set[] = $time_x;

            }
        }

        unset($_POST['total_time_range']);
        $_POST['time_range'] = json_encode($time_set);  
      




        
        $status = $this->VehicleModel->createVehicle($_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'Vehicle added';
            
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/addVehicle'));
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Vehicle/addVehicle'));
    }
    
    public function editVehicle($vehicle_id){

        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($vehicle_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/addVehicle'));
        }
        $template['page'] = 'Vehicle/addVehicle';
        $template['menu'] = "vehicle Management";
        $template['smenu'] = "Edit vehicle";
        $template['pDescription'] = "Edit vehicle Details";
        $template['pTitle'] = "Edit vehicle";
        $template['vehicle_id'] = $vehicle_id;
        $vehicle_id = decode_param($vehicle_id);
        $template['vehicle_data'] = $this->VehicleModel->getVehicle($vehicle_id);
        $template['company_data'] =  $this->CompanyModel->getCompany();
        $template['vehicle_type'] =  $this->VehicleModel->getVehicleType();
        $template['mile_range'] = json_decode($template['vehicle_data']->mile_range);
        $template['time_range'] = json_decode($template['vehicle_data']->time_range);
        

        $this->load->view('template',$template);
    }
    
    
    public function updateVehicle($vehicle_id = ''){
        $err = 0;
        $errMsg = '';
        $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
        if(empty($vehicle_id) || !isset($_POST) || empty($_POST) || !is_numeric(decode_param($vehicle_id))){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/addVehicle'));
        }else if($err == 0 && (!isset($_POST['title']) || empty($_POST['title']))){
            $err = 1;
            $errMsg = 'Provide a Title';
        }else if($err == 0 && (!isset($_POST['child_seat']) || empty($_POST['child_seat']))){
            $err = 1;
            $errMsg = 'Provide Vehicle make';
        } else if($err == 0 && (!isset($_FILES['vehicle_image']) || empty($_FILES['vehicle_image']))){
            $err = 1;
            $errMsg = 'Provide Vehicle Image';
        }
		$config = set_upload_service("assets/uploads/services");
        $this->load->library('upload');
        $config['file_name'] = time()."_".$_FILES['vehicle_image']['name'];
        $this->upload->initialize($config);
        if($this->upload->do_upload('vehicle_image')){
            $upload_data = $this->upload->data();
            $_POST['vehicle_image'] = $config['upload_path']."/".$upload_data['file_name'];
        }
        if($err == 1){
            $flashMsg['message'] = $errMsg;
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/editVehicle'));
        }




        //----*****************-----EDIT VEHICLE MILE UPDATE LOGIC START  ------*****************------

        $total_mile_range = $_POST['total_mile_range'];  

        if($total_mile_range > 0){
            $mile_set = array(); $last_mile_index=0;
            foreach($_POST as $key1 => $value1){
                if (strpos($key1, 'mile-range-') !== false) { 
                   $test =  explode('mile-range-',$key1);
                   if($last_mile_index < $test[1])
                    $last_mile_index = $test[1];
                }
            }
                
            for($i=1;$i<=$last_mile_index;$i++){
                if(!empty($_POST['mile-range-'.$i])){
                    $res = explode('-',$_POST['mile-range-'.$i]);
                    
                    $x = (object) [
                        'from' => $res[0],
                        'to' => $res[1],
                        'single' => $res[2],
                        'return' => $res[3]
                    ];
                    $mile_set[] = $x;
                }
                unset($_POST['mile-range-'.$i]);
            }
        }

         foreach($_POST as $key => $value){         
            if (strpos($key, 'mile-range-') !== false) { 
                unset($_POST[$key]);
            }
           }     

           $_POST['mile_range'] = json_encode($mile_set);  
            unset($_POST['total_mile_range']);

  

         //---*****************---EDIT VEHICLE TIME  UPDATE LOGIC START ----******************---

        $total_time_range = $_POST['total_time_range']; 

        if($total_time_range > 0){
            $time_set = array(); $last_time_index=0;
            foreach($_POST as $key1 => $value1){              
                if (strpos($key1, 'time-range-') !== false) { 
                   $test =  explode('time-range-',$key1);
                   if($last_time_index < $test[1])
                   
                    $last_time_index = $test[1];
                }
            }

            for($i=1;$i<=$last_time_index;$i++){
                if(!empty($_POST['time-range-'.$i])){
                    $res = explode('-',$_POST['time-range-'.$i]);
                    
                    $x = (object) [
                        'from' => $res[0],
                        'to' => $res[1],
                        'single' => $res[2],
                        'return' => $res[3]
                    ];
                    $time_set[] = $x;
                }
                unset($_POST['time-range-'.$i]);
           }
        }

       foreach($_POST as $key => $value){         
        if (strpos($key, 'time-range-') !== false) { 
            unset($_POST[$key]);
        }
       }     

       $_POST['time_range'] = json_encode($time_set);  
        unset($_POST['total_time_range']);

     //---*****************---EDIT VEHICLE TIME  UPDATE LOGIC  END ----******************---







        $status = $this->VehicleModel->updateVehicle(decode_param($vehicle_id),$_POST);
        if($status == 1){
            $flashMsg['class'] = 'success';
            $flashMsg['message'] = 'Vechicle Details edited';
            
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('Vehicle/viewVehicle'));
        }
        $this->session->set_flashdata('message',$flashMsg);
        redirect(base_url('Vehicle/addVehicle'));
    }








    public function getVehicleData(){
       $return_arr = array('status'=>'0');
        if(!isset($_POST)||empty($_POST)||!isset($_POST['vehicle_id'])||empty($_POST['vehicle_id'])){
            echo json_encode($return_arr);exit;
        }
        $vehicle_id = decode_param($_POST['vehicle_id']);
        //$vehicle_id="151";
        $vehicle_data1 = $this->VehicleModel->getVehicleData(array('vehicle_id'=>$vehicle_id));
        if(!empty($vehicle_data1)){
            $return_arr['status'] = 1;
            $return_arr['vehicle_data1'] = $vehicle_data1;
        }
        echo json_encode($return_arr);exit;
    }   

}
?>