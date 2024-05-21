<?php
class ReviewForm extends CI_Controller {

    public function index() {
        $this->load->helper('custom_helper');
        $this->load->view('reviewForm');
    }


    public function save_review() {
        $this->load->helper('custom_helper');

        $firstName = $this->input->post('firstName');
        $trip_id = $this->input->post('trip_id');
        $rating = $this->input->post('rating');
        $reviewType = $this->input->post('reviewType');
        $comment = $this->input->post('comment');
    
        $data = array(
        
            'trip_id' => $trip_id,
            'name' => $firstName,
            'comment' => $comment,
            'reviewType' => $reviewType,
            'rating' => $rating,
           
        );
       
        $this->load->model('Review_Model');
       $this->Review_Model->addReview($data);

        
    }


}
?>