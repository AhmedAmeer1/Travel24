<?php
class Review extends CI_Controller {

 
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


    public function reviewList(){
        $template['page'] = 'Review/review_list';
        $template['pTitle'] = "View Review";
        $template['pDescription'] = "View and Manage Review"; 
        $template['menu'] = "Review Management";
        $template['smenu'] = "View Review";
        $template['customerData'] = $this->Customer_model->get_customer();
        $this->load->view('template',$template);
    }
}
?>
