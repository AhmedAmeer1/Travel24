<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/London');
        $this->load->model('BookingModel');
        if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
        
     }
     public function listBookingDetails(){
        $template['page'] = 'Booking/Booking_list';
        $template['pTitle'] = "View Booking";
        $template['pDescription'] = "View and Manage Booking"; 
        $template['menu'] = "Booking Management";
        $template['smenu'] = "View Booking";
        $template['orderData'] = $this->BookingModel->getBookingDetails();
        //print_r($template1);exit;
        $this->load->view('template',$template);
    }

    public function changebookingStatus($id = '',$status = ''){
         $flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
         if(!isset($_POST) || empty($_POST) || !isset($_POST['id']) || empty($_POST['id']) || empty(decode_param($_POST['id']))){
             $this->session->set_flashdata('message',$flashMsg);
         }
         $id=decode_param($id);
         $status1 = $this->BookingModel->changebookingStatus($id,$status);
         if(($status==1 || $status==3) && $status1){
             $flashMsg =array('message'=>'Booking Accepted..!','class'=>'success');
             $this->session->set_flashdata('message', $flashMsg);
             redirect(base_url('Booking/listBookingDetails'));
         }
         if($status==2 && $status1){
             $flashMsg =array('message'=>'Booking Rejected..!','class'=>'success');
             $this->session->set_flashdata('message', $flashMsg);
             redirect(base_url('Booking/listBookingDetails'));
         }
        if($status==4){
             $flashMsg =array('message'=>'Trip Started..!','class'=>'success');
             $this->session->set_flashdata('message', $flashMsg);
             redirect(base_url('Booking/listBookingDetails'));
        }
        if($status==5){
            $flashMsg =array('message'=>'Trip ended..!','class'=>'success');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('Booking/listBookingDetails'));
        }

        redirect(base_url('Booking/listBookingDetails'));
    }

    public function getBookingData(){
        $return_arr = array('status'=>'0');
        if(!isset($_POST)||empty($_POST)||!isset($_POST['booking_id'])||empty($_POST['booking_id'])){
            echo json_encode($return_arr);exit;
        }
        $booking_id  = decode_param($_POST['booking_id']);
        $book_data = $this->BookingModel->getBgDetails($booking_id);
        if(!empty($book_data)){
            $return_arr['status'] = 1;
            $return_arr['book_data'] = $book_data;
        }
        echo json_encode($return_arr);exit;
    }

   



}
?>
