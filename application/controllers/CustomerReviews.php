<?php
class CustomerReviews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Europe/London');
        $this->load->helper('custom_helper');
        $this->load->model('Review_Model');
        
    }

    public function index() {
        debug_log(" inside controller review");
        $data['CustomerReviewData'] = $this->Review_Model->getReviewDetailsforAdmin();
        debug_log($data);
        $this->load->view('customerReviews', $data);
    }
}
?>
