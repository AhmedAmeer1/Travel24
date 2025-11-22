<?php
class Payment extends CI_Controller {
	 
	public function __construct(){
		parent::__construct();
		$this->load->library("paypal");
		$this->load->helper('cookie');
		$this->load->helper("url");
		$this->load->model('Index_Model');
	}


	public function index(){

		$this->load->view("index");
		return;

	}


	public function subscribe(){

		if ( !empty($_POST["plan_name"]) && !empty($_POST["plan_description"]) ) {

			$this->paypal->set_api_context();

			$this->paypal->set_plan( $_POST["plan_name"], $_POST["plan_description"], "INFINITE" );

			$definition = "Regular Payments";
			$type       = "REGULAR";
			$frequency  = "MONTH";
			$frequncy_interval = '1';
			$cycles = 0;
			$price = "49";

			$this->paypal->set_billing_plan_definition( $definition, $type, $frequency, $frequncy_interval, $cycles, $price );

			$returnurl = base_url()."index.php/payment/success";
			$cancelurl = base_url()."index.php/payment/cancel";

			$this->paypal->set_merchant_preferences( $returnurl, $cancelurl );

			$line1 = "Street - 1, Sector - 1";
			$city  = "Dhaka";
			$state = "Dhaka";
			$postalcode = "12345";
			$country = "AU";

			$this->paypal->set_shipping_address( $line1, $city, $state, $postalcode, $country );

			$agreement_name = "Payment Agreement Name";
			$agreement_description = "Payment Agreement Description";

			$this->paypal->create_and_activate_billing_plan( $agreement_name, $agreement_description );

		}

	}

	public function cancel(){
		//$this->index();
		redirect(base_url('index'));
		return;
	}

	//After successfully create an agreement we will be redirected to this function
	public function success(){

		if ( !empty( $_GET['token'] ) ) {

		    $token = $_GET['token'];
		    $this->paypal->execute_agreement( $token );
		    $this->index();

		}

		return;

	}

	public function create_payment(){

		$this->paypal->set_api_context();

		$payment_method = "paypal";
		$return_url     = base_url()."index.php/payment/success_payment";
		$cancel_url     = base_url()."index.php/payment/cancel";
		$total          = $_SESSION['total_fare'];
		// $total          = 200;
		$description    = "Paypal product payment";
		$intent         = "sale";
		
		

		$this->paypal->create_payment( $payment_method, $return_url, $cancel_url, 
        $total, $description, $intent );

        return;

	}

	//After creating a payment successfully we will be redirected here
	public function success_payment(){ 
		
	


		if ( !empty( $_GET['paymentId'] ) && !empty( $_GET['PayerID'] ) ) {

			$this->paypal->execute_payment( $_GET['paymentId'], $_GET['PayerID'] );
			$_SESSION["book_data"]['payment_id'] =$_GET['paymentId'];
			$_SESSION["book_data"]['payer_id'] = $_GET['PayerID'];
			$_SESSION['payment_status'] = "success";


			$result = $this->Index_Model->save_booking();
			
			$data['booking_id'] = $result['booking_id'];
			$data['first_name'] =$_SESSION["book_data"]['first_name'];
			$data['last_name']=$_SESSION["book_data"]['last_name'];
			$data['email']=$_SESSION["book_data"]['email'];
			$data['phone']=$_SESSION["book_data"]['phone'];
			$data['source'] =$_SESSION["source"];
			$data['destination'] =$_SESSION["destination"];
			$data['way_point_1'] =(!empty($_SESSION["way_points"][0])?$_SESSION["way_points"][0]:'');
			$data['way_point_2']=(!empty($_SESSION["way_points"][1])?$_SESSION["way_points"][1]:'');
			$data['way_point_3']=(!empty($_SESSION["way_points"][2])?$_SESSION["way_points"][2]:'');
			$data['type'] ="Paypal";
			$this->db->where('vehicle_id',$_SESSION["vehice_id"]);

			// $data['vehicle'] =$this->db->get('vehicle')->row('title');

			$data['vehicle'] =$_SESSION['vehicle_name'];


			$data['travel_date'] = $_SESSION["book_data"]['travel_date'];
			$data['travel_time'] =$_SESSION["book_data"]['travel_time'];
			$data['travel_type'] = ($_SESSION["journey_type"]== "1"?"Single":"Return");
			$data['passenger'] = $_SESSION["book_data"]['passenger'];
			$data['suitcase'] =$_SESSION["book_data"]['suitcase'];
			$data['child_seat'] = $_SESSION["book_data"]['child_seat'];
			$data['child_seat_cost'] = $_SESSION["book_data"]['child_seat_cost'];
			$data['greet_status'] =  $_SESSION["book_data"]['greet_status'];
			$data['greeting_cost'] = $_SESSION["book_data"]['greeting_cost'];
			// $data['sub_total'] = $_SESSION['base_fare'];
			$data['sub_total'] = $_SESSION['subTotal'];
			$data['total'] = $_SESSION["book_data"]['amount'];
			$data['promocode_discount'] =$_SESSION["book_data"]['promocode_discount'];


			// undefined variables
			$data['pick_up'] = $_SESSION["book_data"]['pick_up_door_name'];
			$data['hand_lagguage'] = $_SESSION["hand_lagguage"] ?? get_cookie('hand_lagguage');
			$data['dropoff_cost'] = $_SESSION["book_data"]['dropoff_cost'];
			$data['flight_no'] = $_SESSION["book_data"]['flight_no'];
			$data['scomments_special_inst'] = $_SESSION["scomments_special_inst"] ?? get_cookie('scomments_special_inst');

			$this->email_notification($data);
		  
			
			// echo "<script>
			// alert('Thank you for your booking! We have sent you a email for the confirmation .');
			// window.location.href = '" . base_url('index/journey_data?status=1&booking_id=' . $result['booking_id']) . "';
			// </script>";
			// exit;
			
			redirect(base_url('index/journey_data?status=1&booking_id='.$result['booking_id']));

		}

		return;

	}
	public function email_notification($data){

		
		$this->load->library('email');
		$config['protocol'] = 'sendmail'; // mwail, sendmail, or smtp    The mail sending protocol.
		//$config['smtp_host'] = 'smtp.gmail.com';
		//$config['smtp_user'] = 'adarsh.techware@gmail.com'; // SMTP Username.
		//$config['smtp_pass'] = 'lcvhzkxjldzxdbja'; // SMTP Password.
		//$config['smtp_crypto'] = "tls";
		//$config['smtp_port'] = '587'; // SMTP Port.
		//$config['smtp_timeout'] = '05'; // SMTP Timeout (in seconds).
		$config['wordwrap'] = TRUE; // TRUE or FALSE (boolean)    Enable word-wrap.
		$config['wrapchars'] = 76; // Character count to wrap at.
		$config['mailtype'] = 'html'; // text or html Type of mail. If you send HTML email you must send it as a complete web page. Make sure you don't have any relative links or relative image paths otherwise they will not work.
		$config['charset'] = 'utf-8'; // Character set (utf-8, iso-8859-1, etc.).
		$config['validate'] = FALSE; // TRUE or FALSE (boolean)    Whether to validate the email address.
		$config['priority'] = 3; // 1, 2, 3, 4, 5    Email Priority. 1 = highest. 5 = lowest. 3 = normal.
		$config['crlf'] = "\r\n"; // "\r\n" or "\n" or "\r" Newline character. (Use "\r\n" to comply with RFC 822).
		$config['newline'] = "\r\n"; // "\r\n" or "\n" or "\r"    Newline character. (Use "\r\n" to comply with RFC 822).
		$config['bcc_batch_mode'] = FALSE; // TRUE or FALSE (boolean)    Enable BCC Batch Mode.
		$config['bcc_batch_size'] = 200; // Number of emails in each BCC batch.
		$this->email->initialize($config);
		$this->email->from('bookings@travel24taxi.com', 'TRAVEL 24 ');
		$this->email->to($data['email']);


		$this->email->subject('Your Travel24 Taxi order has been received!');
		$mesg = $this->load->view('template/email', $data, true);
		$this->email->message($mesg);



	
		if ($this->email->send()) {
			$to = "bookings@travel24taxi.com";
			$subject = $data['booking_id'];

			//$to = "soumen.karmakar@solutions2xl.com";
			$this->email->initialize($config);
			$this->email->from('bookings@travel24taxi.com', 'TRAVEL24 ');
			$this->email->to($to);
			$this->email->subject($subject);
			// $this->email->AddEmbeddedImage(dirname(__FILE__) . 'https://travel24taxi.com/assets/images/travel24/Logo.svg','traveltaxi');
			$mesg = $this->load->view('template/email_admin', $data, true);
			$this->email->message($mesg);
			$this->email->send();

			//echo "email send";
		} else {
			//echo "email not send";
		}

	}
	
}