<?php
class Review extends CI_Controller {

 
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Europe/London');
        $this->load->helper('custom_helper');
		$this->load->model('Review_Model');
        if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
        if($this->session->userdata['user_type'] != 1){
            redirect(base_url('Dashboard'));
        }
    
 	}

    public function reviewList(){
        $template['page'] = 'Review/review_list';
        $template['pTitle'] = "View Review";
        $template['pDescription'] = "View and Manage Review"; 
        $template['menu'] = "Review Management";
        $template['smenu'] = "View Review";
        $template['reviewData'] = $this->Review_Model->getReviewDetailsforAdmin();
        $this->load->view('template',$template);
    }
}
?>
