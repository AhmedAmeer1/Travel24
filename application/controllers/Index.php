<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Index extends CI_Controller
{

 private $fleet_data;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Europe/London');
		$this->load->model('Index_Model');
		$this->load->helper('cookie');
		$this->load->helper('custom_helper');
		$this->load->model('Review_Model');
		$this->load->config('fleet_data'); 
		  $this->fleet_data = $this->config->item('fleet_data'); // Get the data from the config file
	}
	public function index()
	{

		$this->session->sess_destroy();

		if (!isset($_SESSION)) {
			session_start();
		}




		/* === Language Translation [ Directory Listings ] === */
		/* === Common Homepage Supporting Methods === */
		$home_template['page'] = "Homepage";
		$home_template['title'] = $this->db->get('settings')->row('title');
		$home_template['data'] = "Home page";
		$home_template['result'] = $this->db->get('settings')->row();
		$this->db->join('vehicle_type vt', 'vt.id=v.vehicle_type');
		$home_template['fleet'] =  $this->db->get('vehicle v')->result();
  	    $home_template['fleet_data'] = $this->fleet_data;
		$this->load->model('Review_Model');
		$home_template['reviews'] =  $this->Review_Model->getAllReviews(1);
		$home_template['CustomerReviewData'] = $this->Review_Model->getReviewDetailsforAdmin();
	// debug_log(" -----home_template  --------- ");
	// 		debug_log($home_template);

		$this->load->view('index', $home_template);
	}


	public function Search()
	{


		$post_data = $this->input->post();

		if (count($post_data) == 0) {
			redirect($this->index);
		}
		$latitudeFrom = $post_data['sourceLat'];
		$longitudeFrom = $post_data['sourceLon'];

		$latitudeTo = $post_data['destLat'];
		$longitudeTo = round($post_data['destLong'], 8);

		$special_location_id = $this->Index_Model->is_special_location($post_data['source'], $post_data['destination']);

		if (isset($special_location_id)) {
			$found_location = "true";
		} else {
			$found_location = "false";
		}

		// $theta    = $longitudeFrom - $longitudeTo;
		// $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
		// $special_locations =$this->Index_Model->get_special_locations();
		// $found_location ="fasle";
		// foreach($special_locations as $key => $sl){
		// 	$sl_lattitude = $sl->lattitude;
		// 	$sl_longitude = $sl->longitude;
		// 	$theta    = $longitudeTo - $sl_longitude;
		// 	$dist    = sin(deg2rad($latitudeTo)) * sin(deg2rad($sl_lattitude)) +  cos(deg2rad($latitudeTo)) * cos(deg2rad($sl_lattitude)) * cos(deg2rad($theta));
		// 	$dist    = acos($dist);
		// 	$dist    = rad2deg($dist);
		// 	$miles   = $dist * 60 * 1.1515;
		// 	$output = round($miles, 2);
		// 	if($output <= $sl->mile){
		// 	  $found_location ="true";
		//       $location_id = $sl->id;
		// 	  break; 
		// 	}

		// }

		$data['page'] = "Listpage";
		$data['page_title'] = "List Page";
		$data['post_data'] = $post_data;
		$data['total_way_points'] = $post_data['total_way_points'];
		$this->db->where('status', 1);
		$this->db->order_by('sort_order', "ASC");
		$data['vehicle_type'] = $this->db->get('vehicle_type')->result();
		$data['way_points'] = array();
		// array_push($data['way_points'],$post_data['source']);
		for ($i = 1; $i <= $data['total_way_points']; $i++) {
			if (($post_data['wayPoint-' . $i] != $post_data['source']) && ($post_data['wayPoint-' . $i] != $post_data['destination'])) {
				//echo "if".$post_data['source']."=".$post_data['wayPoint-'.$i];
				array_push($data['way_points'], $post_data['wayPoint-' . $i]);
			}
			//  else{
			// 	echo "else".$post_data['source']."=".$post_data['wayPoint-'.$i];
			//  }
		}
		//array_push($data['way_points'],$post_data['destination']);

		$this->db->where('v.status', 1);
		$this->db->order_by('vt.sort_order', 'ASC');
		$this->db->join('vehicle_type vt', 'vt.id=v.vehicle_type');
		$data['vehicle'] = $this->db->get('vehicle v')->result();
		$data['max_passenger'] = 0;
		$data['max_suit_case'] = 0;
		foreach ($data['vehicle'] as $new) {
			if ($new->noOfPassengers >  $data['max_passenger']) {
				$data['max_passenger'] = $new->noOfPassengers;
			}
			if ($new->noOfSuitcases >   $data['max_suit_case']) {
				$data['max_suit_case']  = $new->noOfSuitcases;
			}
		}
		if ($found_location == "true") {
			$data['special_location'] = $special_location_id;
		} else {
			$data['special_location'] = 0;
		}
		$_SESSION["source"] = $post_data['source'];
		$_SESSION["destination"] = $post_data['destination'];
		$_SESSION["total_way_points"] = (!empty($data['total_way_points']) ? $data['total_way_points'] : 0);
		$_SESSION["way_points"] = $data['way_points'];


		$data['all_points'] =  array();
		$data['all_points'][] = $post_data['source'];
		if ($_SESSION["total_way_points"] != 0) {
			foreach ($data['way_points'] as $new) {
				$data['all_points'][] = $new;
			}
		}

		$data['all_points'][] = $post_data['destination'];
		//echo "<pre>";print_r($data['all_points']);exit;
		$data['setting'] = $this->db->get('settings')->row();

		$this->load->view('listView', $data);
	}
	public function filter_result()
	{
		$input = $this->input->post();
		$result = $this->Index_Model->filter_vehicle($input);
		echo json_encode(array('result' => $result));
	}
	public function journey_details()
	{
		$_SESSION["vehice_id"] = $this->input->post('selected_vehicle_id');
		$_SESSION["journey_type"] = $this->input->post('selected_travel_type');
		$_SESSION['total_fare'] = $this->input->post('total_fare');
		$_SESSION["base_fare"] = $this->input->post('total_fare');
	}
	public function journey_data()
	{

		if (!isset($_SESSION["vehice_id"])) {
			redirect('Index');
		}
		//echo "<pre>";print_r($_SESSION);exit;
		$_SESSION['total_fare'] = 0;
		$_SESSION['book_data'] = array();
		$_SESSION["discount"] = 0;
		$_SESSION["promocode"] = 0;



		if (!empty($_GET['status']) && $_GET['status']  == 1) {
			$payment_status = "done";
		} else {
			$payment_status = "not_done";
		}
		if (!empty($_GET['booking_id'])) {
			$booking_id = $_GET['booking_id'];
		} else {
			$booking_id = 0;
		}

		$this->db->where('vehicle_id', $_SESSION["vehice_id"]);
		$data['vechicle_data'] = $this->db->get('vehicle')->row();
		$data['payment_status'] = $payment_status;
		$data['booking_id'] = $booking_id;
		$data['setting'] = $this->db->get('settings')->row();
		$this->db->where('status', 1);
		$data['payment_types'] = $this->db->get('payment_types')->result();

		date_default_timezone_set("Europe/Berlin");
		$dateTime = date("Y:m:d-H:i:s");

		$data['dateTime'] = $dateTime;
		$data['createHash'] = $this->createHash("13.00", "826");
		$this->load->view('details', $data);
	}
	public function booking_init()
	{

		$this->load->helper('custom_helper');

		$input = $this->input->post();
		$booking['first_name'] = $input['first_name'];
		$booking['last_name'] = $input['last_name'];
		$booking['email'] = $input['email'];
		$booking['phone'] = $input['phone'];
		$booking['vehicle_id'] = $_SESSION["vehice_id"];
		$booking['service_type'] = $_SESSION["journey_type"];
		$booking['source'] = $_SESSION["source"];
		$booking['destination'] = $_SESSION["destination"];
		$booking['way_point_1'] = (!empty($_SESSION["way_points"][0]) ? $_SESSION["way_points"][0] : '');
		$booking['way_point_2'] = (!empty($_SESSION["way_points"][1]) ? $_SESSION["way_points"][1] : '');
		$booking['way_point_3'] = (!empty($_SESSION["way_points"][2]) ? $_SESSION["way_points"][2] : '');
		$dates = str_replace("/", "-", $input['jouney_date']);
		$booking['travel_date'] = date("Y-m-d", strtotime($dates));
		$booking['travel_time'] = $input['journey_time'];
		$booking['pick_up_door_name'] = $input['pick_up'];
		$booking['flight_no'] = $input['flight_no'];
		$booking['passenger'] = $input['no_of_passenger'];
		$booking['suitcase'] = $input['no_of_suitcase'];
		$booking['child_seat'] = $input['child_seat'];
		$booking['greet_status'] = $input['meet_and_greet'];
		$booking['dropOff_status'] = $input['drop_off'];
		$booking['payment_type'] = $input['payment_method'];
		$booking['base_fare'] = $_SESSION['base_fare'];
		$booking['user_id'] = (!empty($_SESSION['user_id']) ? $_SESSION['user_id'] : '0');
		$booking['userType'] = (!empty($_SESSION['user_type']) ? $_SESSION['user_type'] : '');
		$booking['status'] = 1;
		$booking['promocode_discount'] = (!empty($_SESSION["discount"]) ? $_SESSION["discount"] : 0);



		if ($booking['greet_status'] == '1') {
			$greeting_cost = 8;
		} else {
			$greeting_cost = 0;
		}


		if ($booking['dropOff_status'] == '1') {
			$dropoff_cost = 6;
		} else {
			$dropoff_cost = 0;
		}



		if ($booking['child_seat']  != 0) {
			$this->db->where('vehicle_id', $booking['vehicle_id']);
			$cost_per_seat = $this->db->get('vehicle')->row('cost_per_child_seat');
			$total_cost_per_seat = $cost_per_seat * $booking['child_seat'];
			$child_seat_cost = $total_cost_per_seat;
		} else {
			$child_seat_cost = 0;
		}
		$booking['child_seat_cost'] = $child_seat_cost;
		$booking['greeting_cost'] = $greeting_cost;
		$booking['dropoff_cost'] = $dropoff_cost;

		$booking['amount'] = $_SESSION['base_fare'] + $greeting_cost + $dropoff_cost + $child_seat_cost;
		//echo "a-".$booking['amount']."discount-".$booking['promocode_discount'];
		if ($booking['promocode_discount'] != 0) {
			$booking['amount'] = $booking['amount'] - ($booking['amount'] * ($booking['promocode_discount'] / 100));
			//echo "amount".	$booking['amount'];
			$booking['amount'] = number_format((float)$booking['amount'], 2, '.', '');
		}

		//echo "b-".$booking['amount'];
		//exit;

		//$_SESSION['promocode'] = (!empty( get_cookie('promocode'))? get_cookie('promocode'):$_SESSION['promocode']);



		$_SESSION['total_fare'] = $booking['amount'];
		$_SESSION['promocode'] = $booking['promocode_discount'];
		$_SESSION['hand_lagguage'] = $input['hand_lagguage'];
		$_SESSION['pick_up'] = $input['pick_up'];
		$_SESSION['scomments_special_inst'] = $input['scomments_special_inst'];



		$_SESSION["book_data"] = $booking;

		// setting cokies for online payment  because session variable is not working for first time online booking 
		set_cookie('first_name', $booking['first_name'], 86400);
		set_cookie('last_name', $booking['last_name'], 86400);
		set_cookie('email', $booking['email'], 86400);
		set_cookie('phone', $booking['phone'], 86400);
		set_cookie('vehicle_id', $booking['vehicle_id'], 86400);
		set_cookie('service_type', $booking['service_type'], 86400);
		set_cookie('source', $booking['source'], 86400);
		set_cookie('destination', $booking['destination'], 86400);
		set_cookie('way_point_1', $booking['way_point_1'], 86400);
		set_cookie('way_point_2', $booking['way_point_2'], 86400);
		set_cookie('way_point_3', $booking['way_point_3'], 86400);
		set_cookie('dates', $dates, 86400);
		set_cookie('travel_date', $booking['travel_date'], 86400);
		set_cookie('travel_time', $booking['travel_time'], 86400);
		set_cookie('pick_up_door_name', $booking['pick_up_door_name'], 86400);
		set_cookie('flight_no', $booking['flight_no'], 86400);
		set_cookie('passenger', $booking['passenger'], 86400);
		set_cookie('suitcase', $booking['suitcase'], 86400);
		set_cookie('child_seat', $booking['child_seat'], 86400);

		set_cookie('greet_status', $booking['greet_status'], 86400);
		set_cookie('dropOff_status', $booking['dropOff_status'], 86400);

		set_cookie('base_fare', $booking['base_fare'], 86400);
		set_cookie('user_id', $booking['user_id'], 86400);
		set_cookie('userType', $booking['userType'], 86400);
		set_cookie('status', $booking['status'], 86400);
		set_cookie('promocode_discount', $booking['promocode_discount'], 86400);
		set_cookie('child_seat_cost', $booking['child_seat_cost'], 86400);

		set_cookie('greeting_cost', $booking['greeting_cost'], 86400);
		set_cookie('dropoff_cost', $booking['dropoff_cost'], 86400);

		set_cookie('amount', $booking['amount'], 86400);
		set_cookie('scomments_special_inst', $input['scomments_special_inst'], 86400);
		set_cookie('hand_lagguage', $input['hand_lagguage'], 86400);
		set_cookie('pick_up', $input['pick_up'], 86400);
		set_cookie('total_fare', $booking['amount'], 86400);
		set_cookie('travel_type', ($booking['service_type'] == "1" ? "Single" : "Return"), 86400);
		
		$this->db->where('vehicle_id', $_SESSION["vehice_id"]);
		set_cookie('vehicleName', $this->db->get('vehicle')->row('title'), 86400);




		$this->load->helper('custom_helper');



		$return = array();


		if ($input['payment_method'] == "cash") {
			$result = $this->Index_Model->save_booking();


			debug_log(" -----THE DATA RETURN FROM  SAVE BOOKING FUNCTION INSIDE   CASH FUNCTION   1111111  --------- ");
			debug_log($result);


			if ($result['status'] == 1) {

				$return['booking_id'] = $result['booking_id'];
				$data['booking_id'] = $result['booking_id'];
				$data['first_name'] = $input['first_name'];
				$data['last_name'] = $input['last_name'];
				$data['email'] = $input['email'];
				$data['phone'] = $input['phone'];
				$data['source'] = $_SESSION["source"];
				$data['destination'] = $_SESSION["destination"];
				$data['way_point_1'] = (!empty($_SESSION["way_points"][0]) ? $_SESSION["way_points"][0] : '');
				$data['way_point_2'] = (!empty($_SESSION["way_points"][1]) ? $_SESSION["way_points"][1] : '');
				$data['way_point_3'] = (!empty($_SESSION["way_points"][2]) ? $_SESSION["way_points"][2] : '');
				$data['type'] = "Cash";
				$this->db->where('vehicle_id', $_SESSION["vehice_id"]);
				$data['vehicle'] = $this->db->get('vehicle')->row('title');
				$data['travel_date'] = $input['jouney_date'];
				$data['travel_time'] = $booking['travel_time'];
				$data['travel_type'] = ($booking['service_type'] == "1" ? "Single" : "Return");
				$data['passenger'] = $booking['passenger'];
				$data['suitcase'] = $booking['suitcase'];
				$data['child_seat'] = $booking['child_seat'];
				$data['child_seat_cost'] = $child_seat_cost;

				$data['greet_status'] = $booking['greet_status'];
				$data['greeting_cost'] = $greeting_cost;

				$data['dropOff_status'] = $booking['dropOff_status'];
				$data['dropoff_cost'] = $dropoff_cost;

				$data['sub_total'] = $_SESSION['base_fare'];
				$data['total'] = $booking['amount'];
				$data['promocode_discount'] = $booking['promocode_discount'];
				$data['scomments_special_inst'] = $input['scomments_special_inst'];
				$data['hand_lagguage'] = $input['hand_lagguage'];
				$data['flight_no'] = $input['flight_no'];
				$data['pick_up'] = $input['pick_up'];
				$data['image'] = 'https://travel24taxi.com/assets/images/travel24/Logo.svg';

				debug_log(" dropOff_status' -----9999999999999999999999999- ");
				debug_log($booking['dropOff_status']);

				$this->email_notification($data);
			} else {
				$return['booking_id'] = "";
			}
		}

		echo   json_encode(array('result' => $return));

		//jouney_date:,journey_time:,:email:email,phone:phone,:pick_up,flight_no:,no_of_passenger:,:no_of_suitcase,hand_lagguage:hand_lagguage,:child_seat,:meet_and_greet
	}
	public function get_book_data()
	{
		$book_id = $this->input->post('book_id');
		$result = $this->Index_Model->get_book_data($book_id);
		$date = date_create($result->travel_date);
		$result->travel_date = date_format($date, "d-m-Y");
		echo   json_encode(array('result' => $result));
	}
	public function check_promo_code()
	{
		$_SESSION["discount"] = 0;
		$_SESSION["promocode"] = 0;
		$_SESSION["email"] = 0;
		$promo_code = $this->input->post('promo_code');
		$email_id = $this->input->post('email_id');
		$result = array();
		$result1 = $this->Index_Model->check_promo_code_usage($promo_code, $email_id);

		if ($result1['status'] == 'success') {
			$result = $this->Index_Model->check_promo_code($promo_code);


			if (empty($result)) {
				$msg =  "Invalid promocode";
			} else {
				if ($result->usage_limit == $result->usage_count) {
					$msg =  "Usage Limit exceed";
				} else if ($result->starting_date > date('Y-m-d H:i:s')) {
					$msg =  " You can use this promocode effective from-" . $result->starting_date;
				} else if ($result->ending_date < date('Y-m-d H:i:s')) {
					$msg =  "This promocode is expired";
				} else {
					$msg = "success";
					$_SESSION["discount"] = $result->discount;
					$_SESSION["promocode"] = $result->promo_code;
				}
			}
		} else {
			$msg = "You are already used this promocode.Please try another promocode";
		}

		set_cookie('promocode', $_SESSION["promocode"], 86400);
		echo  json_encode(array('result' => $result, 'msg' => $msg));
	}
	public function create_account()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check_exist = $this->Index_Model->check_username_exist($username);
		$exist = 0;
		if ($check_exist > 0) {
			$exist = 1;
			$result['effected_rows'] = 0;
			$result['insert_id'] = 0;
			$msg = "This user is already exist. please login";
		} else {
			$data['fullname'] = $this->input->post('first_name') . " " . $this->input->post('last_name');
			$data['email'] = $this->input->post('username');
			$data['phone_no'] = $this->input->post('phone_no');
			$data['password'] = md5($password);
			$result = $this->Index_Model->save_user($data);

			if ($result['effected_rows'] > 0) {
				$msg = "Your profile has been created";
				$_SESSION["user_id"] = $result['insert_id'];
			} else {
				$msg = "Some error occured.Please try again";
			}
		}
		echo  json_encode(array('exist' => $exist, 'msg' => $msg, 'status' => $result['effected_rows'], 'user_id' => $result['insert_id']));
	}
	public function email_notification($data)
	{

		$this->load->helper('custom_helper');



		$this->load->library('email');
		$config['protocol'] = 'sendmail'; // mail, sendmail, or smtp    The mail sending protocol.
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
		$this->email->from('bookings@travel24taxi.com', 'TRAVEL 24 CARS');
		$this->email->to($data['email']);

		$this->email->subject('Your Travel24 Taxi order has been received!');
		$mesg = $this->load->view('template/email', $data, true);
		$this->email->message($mesg);






		if ($this->email->send()) {
			$to = "bookings@travel24taxi.com";
			$subject = $data['booking_id'];

			//$to = "soumen.karmakar@solutions2xl.com";
			$this->email->initialize($config);
			$this->email->from('bookings@travel24taxi.com', 'TRAVEL24 CARS');
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
	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$login = $this->Index_Model->user_login($username, $password);
		$admin_login = $this->Index_Model->admin_login($username, $password);
		if (!empty($login)) {
			echo  json_encode(array('result' => $login, 'status' => 1, 'type' => 'customer', 'msg' => "Login successfully"));
			$_SESSION["user_id"] = $login->user_id;
			$_SESSION["user_type"] = "customer";
		} else if (!empty($admin_login)) {
			echo  json_encode(array('result' => $admin_login, 'status' => 1, 'type' => 'admin', 'msg' => "Admin Login successfully"));
			$_SESSION["user_id"] = $admin_login->id;
			$_SESSION["user_type"] = "admin";
		} else {
			echo  json_encode(array('result' => 'null', 'status' => 0, 'msg' => "Invalid Login"));
		}
	}
	public function account()
	{
		$user_id = $_SESSION["user_id"];
		$user_type = $_SESSION["user_type"];
		$data['user_type'] = $user_type;
		$data['book_details'] = $this->Index_Model->book_details($user_id, $user_type);
		$data['user_details'] = $this->Index_Model->user_details($user_id, $user_type);
		$data['setting'] = $this->db->get('settings')->row();
		// echo "<pre>";print_r($data['user_details']);exit;

		$this->load->view('account', $data);
	}
	public function get_book_details()
	{
		$booking_id = $this->input->post('booking_id');
		$result = $this->Index_Model->book_details_by_id($booking_id);
		echo  json_encode(array('result' => $result));
	}
	public function user_data()
	{
		if (!empty($_SESSION["user_id"])) {
			$data['user_details'] = $this->Index_Model->user_details($user_id);
		} else {
			echo "please login again";
		}
	}
	public function change_user_data()
	{
		$user_id = $_SESSION["user_id"];
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$data['fullname'] = $first_name . " " . $last_name;
		$data['email'] = $this->input->post('email');
		$update = 0;

		$current_password = $this->input->post('password');
		if (!empty($current_password)) {
			$check = $this->Index_Model->check_password($user_id, $current_password);
			if ($check == 0) {
				$msg =  "incorrect current password";
			} else {
				$data['password'] = md5($this->input->post('new_password'));
				$update = $this->Index_Model->update_user_data($user_id, $data);
				if ($update > 0) {
					$msg = "successfully Updated";
				}
			}
		} else {
			$update = $this->Index_Model->update_user_data($user_id, $data);
			if ($update > 0) {
				$msg = "successfully Updated";
			}
		}
		echo  json_encode(array('update' => $update, 'msg' => $msg));
	}
	public function cancel_trip()
	{
		$book_id = $this->input->post('book_id');
		$data['status'] = 6;

		$update = $this->Index_Model->update_booking($book_id, $data);
		if ($update != 0) {
			$msg = "Your Trip has been cancelled as per your request";
		} else {
			$msg = "Some error occured.please try again";
		}
		echo  json_encode(array('msg' => $msg));
	}
	function get_per_mile_charge()
	{
		$vehichle_id = $_POST['vehicle_id'];
		// $total_mile =  round($_POST['total_mile'],2);
		$total_mile =  $_POST['total_mile'];
		$total_minutes = $_POST['durationInMinutes'];


	debug_log(" -----total_mile 1111111  --------- ");
		debug_log($total_mile);
			debug_log(" -----total_minutes 1111111  --------- ");
	debug_log($total_minutes);


		$result = $this->Index_Model->get_vehicle($vehichle_id);
		$special_location = $_POST['special_location'];
		$special_amount_per_mile = 0;
		if ($special_location != 0) {
			$check_mapping = $this->Index_Model->check_vehicle_mapped_to_location($vehichle_id, $special_location);
		}
		if (!empty($check_mapping)) {
			$price_single = $check_mapping->price_single;
			$price_return = $check_mapping->price_return;
			$single =   $check_mapping->price_single;
			$return = $check_mapping->price_return;
		} else {
			//$result->perKm -(fixed price single)
			//$result->perKmReturn -(fixed price return)
			if ($result->mile_range != "" && $result->mile_range != "null") {
				$mile_range = json_decode($result->mile_range);
				foreach ($mile_range as $mr) {

					if ($total_mile >= $mr->from  && $total_mile <= $mr->to) {
						$single = ($mr->single * $total_mile) + $result->perKm;
						$return = ($mr->return * $total_mile * 2) + $result->perKmReturn;
						break;
					} else {
						$single = $result->perKm;
						$return = $result->perKmReturn * 2;
						//break;
					}
				}
			} else {

				$single = $result->perKm;
				$return = $result->perKmReturn * 2;
			}
		}
		$single = round($single, 2);
		$return = round($return, 2);
		// $array1= array('single' =>$single,'retn' =>$return);




		//--***************----COST CALCULATING BASED ON THE MINUTES START  ---***********----

		$singleTime = 0;
		$returnTime = 0;
		if ($result->time_range != "" && $result->time_range != "null") {
			$time_range = json_decode($result->time_range);
			foreach ($time_range as $mr) {

				if ($total_minutes >= $mr->from  && $total_minutes <= $mr->to) {


					$singleTime = $mr->single * $total_minutes;
					$returnTime = $mr->return * $total_minutes;


					break;
				}
			}
		}

		$totalsingle = $single + $singleTime;
		$totalreturn = $return + $returnTime;


		// -----------------------------------------------------------------------------
		// Apply Additional Airport/Terminal Surcharge to Fare
		//
		// Logic:
		// - If either the pickup (source) or drop-off (destination) location contains
		//   the keywords "airport" or "terminal" (case-insensitive), a surcharge applies.
		//     • If only one location matches → Add £8
		//     • If both locations match → Add £16 (double charge)
		// - The surcharge is added to both single and return fare totals.
		// -----------------------------------------------------------------------------

		$beforeAirportCharge_single = $single + $singleTime;
		$beforeAirportCharge_return = $return + $returnTime;
		
		$source = $_POST['source'] ?? '';
		$destination = $_POST['destination'] ?? '';

		// Flags to detect airport or terminal keywords
		$source_is_airport_or_terminal = (
			stripos($source, 'airport') !== false || stripos($source, 'terminal') !== false
		);
		$destination_is_airport_or_terminal = (
			stripos($destination, 'airport') !== false || stripos($destination, 'terminal') !== false
		);

		// Apply the charge based on how many match
		if ($source_is_airport_or_terminal && $destination_is_airport_or_terminal) {
			// Both have airport/terminal — add £16
			$totalsingle += 16;
			$totalreturn += 16;
		} elseif ($source_is_airport_or_terminal || $destination_is_airport_or_terminal) {
			// Only one has it — add £8
			$totalsingle += 8;
			$totalreturn += 8;
		}

		//Airport pickup and drop off cost logic end ----------------------------


		$array1 = array('single' => $totalsingle, 'retn' => $totalreturn, 'beforeAirportCharge_single' => $beforeAirportCharge_single, 'beforeAirportCharge_return' => $beforeAirportCharge_return);

		echo json_encode($array1);
	}





	public function ipg()
	{

		date_default_timezone_set("Europe/Berlin");
		$dateTime = date("Y:m:d-H:i:s");
		$data['total'] = ($_SESSION['total_fare']);


		$bookingData = [
			'first_name' => $_SESSION["book_data"]['first_name'],
			'last_name' => $_SESSION["book_data"]['last_name'],
			'email' => $_SESSION["book_data"]['email'],
			'phone' => $_SESSION["book_data"]['phone'],
			'vehicle_id' => $_SESSION["book_data"]['vehicle_id'],
			'service_type' => $_SESSION["book_data"]['service_type'],
			'source' => $_SESSION["book_data"]['source'],
			'destination' => $_SESSION["book_data"]['destination'],

			'way_point_1' => get_cookie('way_point_1') || '',
			'way_point_2' => get_cookie('way_point_2') || '',
			'way_point_3' => get_cookie('way_point_3') || '',

			'travel_date' => $_SESSION["book_data"]['travel_date'],
			'travel_time' => $_SESSION["book_data"]['travel_time'],
			'pick_up_door_name' => $_SESSION["book_data"]['pick_up_door_name'],
			'flight_no' => $_SESSION["book_data"]['flight_no'] || '',
			'passenger' => $_SESSION["book_data"]['passenger'],
			'suitcase' => $_SESSION["book_data"]['suitcase'],
			'child_seat' => $_SESSION["book_data"]['child_seat'],
			'greet_status' => $_SESSION["book_data"]['greet_status'],
			'dropOff_status' => $_SESSION["book_data"]['dropOff_status'],
			'dropoff_cost' => $_SESSION["book_data"]['dropoff_cost'],
			'base_fare' => $_SESSION["book_data"]['base_fare'],
			'user_id' => $_SESSION["book_data"]['user_id'] || '',
			'userType' => $_SESSION["book_data"]['userType'],
			'status' => $_SESSION["book_data"]['status'],
			'promocode_discount' => $_SESSION["book_data"]['promocode_discount'],
			'child_seat_cost' => $_SESSION["book_data"]['child_seat_cost'],
			'greeting_cost' => $_SESSION["book_data"]['greeting_cost'],
		];


		$bookingOtherData = [
			'vehice_id' => $_SESSION["vehice_id"],
			'travel_type' => get_cookie('travel_type') || '',
			'hand_lagguage' => get_cookie('hand_lagguage'),
			'pick_up' => get_cookie('pick_up'),
			'scomments_special_inst' => get_cookie('scomments_special_inst'),
			'promocode' => get_cookie('promocode') || '',
			'total_fare' => get_cookie('total_fare'),
			'total' => $_SESSION["book_data"]['amount'],
			'sub_total' => $_SESSION["book_data"]['base_fare'],
		];


		$data['bookingData'] = json_encode($bookingData);
		$data['bookingOtherData'] = json_encode($bookingOtherData);


		$data['dateTime'] = $dateTime;
		$data['createHash'] = $this->createHash($data['total'], "826");
		//echo "<pre>";print_r($data);exit;
		$this->load->view('lloyds/ipg', $data);
	}

	public function createHash($chargetotal, $currency)
	{

		date_default_timezone_set("Europe/Berlin");
		$dateTime = date("Y:m:d-H:i:s");

		$storeId = "2206195064";
		$sharedSecret = "C9LdthZHMm176Ljg";
		$stringToHash = $storeId . $dateTime . $chargetotal . $currency . $sharedSecret;
		$ascii = bin2hex($stringToHash);
		return hash("sha256", $ascii);
	}




	public function lloyds_success()
	{

		//loading this class to use debug_log
		$this->load->helper('custom_helper');

		$bookingDataJson = $this->input->get('bookingData');
		$bookingData = json_decode(urldecode($bookingDataJson), true);

		$bookingOtherDataJson = $this->input->get('bookingOtherData');
		$bookingOtherData = json_decode(urldecode($bookingOtherDataJson), true);


		$_SESSION['hand_lagguage'] = $bookingOtherData['hand_lagguage'];
		$_SESSION['pick_up'] = $bookingOtherData['pick_up'];
		$_SESSION['scomments_special_inst']  = $bookingOtherData['scomments_special_inst'];
		$_SESSION['promocode'] = $bookingOtherData['promocode'];
		$_SESSION['total_fare']  = $bookingOtherData['total_fare'];

		$_SESSION["book_data"] = $bookingData;

		$input = $this->input->post();

		$booking['first_name']  =  $bookingData['first_name'];
		$booking['last_name'] =  $bookingData['last_name'];
		$approval_code =  $_POST['approval_code'];
		$order_id  =  $_POST['oid'];
		$refnumber = $_POST['refnumber'];
		$status =  $_POST['status'];
		$_SESSION["book_data"]['payment_id'] = $order_id;
		$_SESSION["book_data"]['payer_id'] = $refnumber;
		$_SESSION['payment_status'] = "success";
		$result = $this->Index_Model->save_booking();

		//setting the values to data variable to send to the email
		$data['booking_id'] = $result['booking_id'];;

		$this->db->where('vehicle_id', $bookingOtherData['vehice_id']);

		$data = $bookingData;
		$data['booking_id'] = $result['booking_id'];
		$data['vehicle'] = $this->db->get('vehicle')->row('title');
		$data['travel_type'] = $bookingOtherData['travel_type'];
		$data['hand_lagguage'] = $bookingOtherData['hand_lagguage'];
		$data['pick_up'] = $bookingOtherData['pick_up'];
		$data['scomments_special_inst'] = $bookingOtherData['scomments_special_inst'];
		$data['promocode'] = $bookingOtherData['promocode'];
		$data['sub_total'] = $bookingOtherData['sub_total'];
		$data['total'] = $bookingOtherData['total'];
		$data['total_fare'] = $bookingOtherData['total_fare'];
		$data['type'] = "Online";


		$this->email_notification($data);

		redirect(base_url('index/journey_data?status=1&booking_id=' . $result['booking_id']));
	}
	public function lloyds_failure()
	{

		$this->load->helper('custom_helper');
		debug_log("entered lloyds_failure ------------------ ");
		// $approval_code =  $_POST['approval_code'];	
		// $status =  $_POST['status'];
		redirect(base_url('index'));
	}
}