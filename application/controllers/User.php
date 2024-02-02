<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
        $this->load->model('User_model');
		$this->load->model('Dashboard_model');
		if(!$this->session->userdata('logged_in')) {
			redirect(base_url('Login'));
		}
 	}
     
	
	public function viewProfile() {
        if(!isset($this->session->userdata['user']) || empty($this->session->userdata['user'])){
            redirect(base_url());
        }
        $template['shop_data'] = '';
		$template['page'] = 'User/viewProfile';
        $template['menu'] = 'User';
        $template['smenu'] = 'View Profile';
        $template['pTitle'] = "User Profile";
        $template['pDescription'] = "Edit or View Profile";
		$this->load->view('template',$template);
	}

	public function editProfile() {
        $user_id = $this->session->userdata('id');
        $user_type = $this->session->userdata('user_type');
		$template['page'] = 'User/editProfile';
        $template['menu'] = "Profile";
        $template['smenu'] = "Edit Profile";
        $template['pTitle'] = "Edit Profile";
        $template['pDescription'] = "Edit User Profile";
        $template['user_data'] = $this->User_model->getUserData();
        if(empty($template['user_data'])){
            redirect(base_url());
        }
		$this->load->view('template',$template);
	}

	public function updateUser(){

 		$user_id = $this->session->userdata('id');
 		$user_type = $this->session->userdata('user_type');
		$flashMsg = array('message'=>'Something went wrong, please try again..!','class'=>'error');
    	if(empty($user_id)){
            $this->session->set_flashdata('message',$flashMsg);
            redirect(base_url('User/editProfile'));
    	}
        if(isset($_FILES['profile_image']) && !empty($_FILES['profile_image'])){
            $config = set_upload_service("assets/uploads/services");
            $this->load->library('upload');
            $new_name = time()."_".$_FILES['profile_image']['name'];
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            if($this->upload->do_upload('profile_image')){
                $upload_data = $this->upload->data();
                $_POST['profile_image'] = $config['upload_path']."/".$upload_data['file_name'];
            }
        }

        if((isset($_POST['password']) || isset($_POST['cPassword'])) && 
           (!empty($_POST['password']) || !empty($_POST['cPassword']))){
            if($_POST['password'] != $_POST['cPassword']){
                $flashMsg = array('message'=>'Re-enter Password..!','class'=>'error');
                $this->session->set_flashdata('message', $flashMsg);
                redirect(base_url('User/editProfile'));
            }
            $password = $_POST['password'];
            unset($_POST['password']);
            unset($_POST['cPassword']);
            $_POST['password'] = md5($password);
        } else {
            unset($_POST['password']);
            unset($_POST['cPassword']);
        }
        if(!isset($_POST['display_name']) || empty($_POST['display_name'])){
            $flashMsg = array('message'=>'Provide a valid Display Name..!','class'=>'error');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/editProfile'));
        } else if (!isset($_POST['username']) || empty($_POST['username'])){
            $flashMsg = array('message'=>'Provide a valid Username..!','class'=>'error');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/editProfile')); 
        }
        if ($user_type == 2){
	        if (!isset($_POST['display_name']) || empty($_POST['display_name'])){
	            $flashMsg = array('message'=>'Provide a display Name..!','class'=>'error');
	            $this->session->set_flashdata('message', $flashMsg);
	            redirect(base_url('User/editProfile'));
	        } else if (!isset($_POST['phone']) || empty($_POST['phone'])){
	            $flashMsg = array('message'=>'Provide a valid Phone Number..!','class'=>'error');
	            $this->session->set_flashdata('message', $flashMsg);
	            redirect(base_url('User/editProfile'));
	        } else if (!isset($_POST['email_id']) || empty($_POST['email_id'])){
                $flashMsg = array('message'=>'Provide a valid Email ID..!','class'=>'error');
                $this->session->set_flashdata('message', $flashMsg);
                redirect(base_url('User/editProfile'));
            }
	    }
        $status = $this->User_model->updateUser($user_id,$user_type,$_POST);
        if($status == 1){
            $flashMsg =array('message'=>'Successfully Updated User Details..!','class'=>'success');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/viewProfile'));
        } else if($status == 2){
            $flashMsg = array('message'=>'Email ID alrady exist..!','class'=>'error');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/editProfile'));
        } else if($status == 3){
            $flashMsg = array('message'=>'Phone Number alrady exist..!','class'=>'error');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/editProfile'));
        } else if($status == 4){
            $flashMsg = array('message'=>'User Name alrady exist..!','class'=>'error');
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/editProfile'));
        } else {
            $this->session->set_flashdata('message', $flashMsg);
            redirect(base_url('User/editProfile'));
        }
	}
    public function list_users(){
       
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if(isset($uriSegments[4])){
            $id = decode_param($uriSegments[4]);
            $template['user_details'] =  $this->User_model->get_user_data($id);
            $template['user_id'] =  $id;
        }else{
            $template['user_id'] =  "";
        }
     
      
        $template['page'] = 'User/user_list';
        $template['pTitle'] = "Add users";
        $template['pDescription'] = "View and Manage Users"; 
        $template['menu'] = "User Management";
        $template['smenu'] = "View User";
        $template['users'] =  $this->User_model->AllUsers();
        $this->load->view('template',$template);
    }
    public function save_new_user(){
        $is_user_exist = $this->User_model->is_user_exist($_POST);
        if($is_user_exist == 0){
            $insert = $this->User_model->save_user($_POST);
            if($insert > 0){
              $this->email_notification($_POST);
            }
        echo ($insert > 0 ?"User Added Successfully":"Some error Occured. Please Try again");
        }else{
            echo  "Username Already Exist";
        }
    }
    public function update_user($id){
        echo $id;
    }
    public function delete_user($id){
        $userid = decode_param($id);
        $this->User_model->delete_user($userid);
        redirect('User/list_users'); 
    }
    public function email_notification($data){
       
		$this->load->library('email');
      
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_user'] = 'adarsh.techware@gmail.com'; // SMTP Username.
		$config['smtp_pass'] = 'lcvhzkxjldzxdbja'; // SMTP Password.
        $config['smtp_crypto'] = "tls";
        $config['smtp_port'] = '587'; // SMTP Port.
		$config['smtp_timeout'] = '05'; // SMTP Timeout (in seconds).
		$config['wordwrap'] = TRUE; // TRUE or FALSE (boolean)    Enable word-wrap.
		$config['wrapchars'] = 76; // Character count to wrap at.
		$config['mailtype'] = 'html'; // text or html Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
		$config['charset'] = 'utf-8'; // Character set (utf-8, iso-8859-1, etc.).
		$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
		$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
		$config['crlf'] = "\r\n" ; // "\r\n" or "\n" or "\r" Newline character. (Use "\r\n" to comply with RFC 822).
		$config['newline'] ="\r\n" ; // "\r\n" or "\n" or "\r"    Newline character. (Use "\r\n" to comply with RFC 822).
		$config['bcc_batch_mode'] = FALSE; // TRUE or FALSE (boolean)    Enable BCC Batch Mode.
		$config['bcc_batch_size'] = 200; // Number of emails in each BCC batch.
		$this->email->initialize($config);
		$this->email->from('divya.techware@gmail.com', 'No Limits Car');
		$this->email->to($data['email']);
        $this->email->subject('Your account has been created with No Limits Car ');
        $msg = "<h2>Username:".$data['username']."</h2><br/><h2>Password:".$data['password']."</h2>";
        $this->email->message($msg);
		$this->email->send();
		// if($this->email->send()){
		// 	$to = implode(", ", [
		// 		"bookings@nolimitscras.co.uk",
		// 		"divyakrishna9334@gmail.com"
		// 	  ]);
		// $this->email->initialize($config);
		// $this->email->from('divya.techware@gmail.com', 'No Limits Car');
		// $this->email->to($to);
        // $this->email->subject('New Nolimit Taxi order has been received!');
		// //$mesg = $this->load->view('template/email_admin',$data,true);
		// $this->email->message("test");
		// $this->email->send();
        // echo "hi.<pre>";print_r($this->email->print_debugger()) ;
		// echo "email send";
		// }else{
        //     echo "<pre>";print_r($this->email->print_debugger()) ;
		// echo "email not send";
		// }

	}

    public function change_status(){
      $this->User_model->change_user_status($_POST);
    }
    public function reset_password(){
        $template['page'] = 'User/reset_password';
        $template['pTitle'] = "Reset Password";
        $template['pDescription'] = "View and Manage Password"; 
        $template['menu'] = "Reset Password";
        $template['smenu'] = "Reset Password";
        $template['users'] =  $this->User_model->AllUsers();
        $this->load->view('template',$template);
    }
    public function update_password(){
        $this->User_model->update_user_password($_POST);
    }
 
}
?>