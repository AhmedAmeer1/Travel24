<?php
class ReviewForm extends CI_Controller {

    public function index() {
        $this->load->helper('custom_helper');
        $this->load->view('reviewForm');
    }


    public function save_review() {
        $this->load->helper('custom_helper');
        debug_log("------------------------------REVIEW   START------------------------------------------------------------------------------------------- ");
       
       
        $firstName = $this->input->post('firstName');

        $trip_id = $this->input->post('trip_id');
        $rating = $this->input->post('rating');
        $comment = $this->input->post('comment');
    

        debug_log($firstName);
         debug_log($comment);    
       debug_log($rating);
        // $booking['first_name'] =$input['first_name'];


        $data = array(
        
            'trip_id' => $trip_id,
            'comment' => $comment,
            'rating' => $rating,
           
        );

        debug_log("-------------111111111111111-------------- ");
       
        $this->load->model('Review_Model');
        debug_log("-------------22222222222-------------- ");
       $this->Review_Model->addReview($data);
       debug_log("-------------33333333333333-------------- ");
        
        // $name = $this->input->post('name');
        // $email = $this->input->post('email');
        // $message = $this->input->post('message');

    }


}
?>