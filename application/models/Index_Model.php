<?php
class Index_Model extends CI_Model{
	public function _construct(){
		parent::_construct();
	}
	public function Search($data){
			$data['status']=1;
			$status = $this->db->insert('booking',$data);
			$res = array('status'=>1,'data'=>'');
			return ($status)?1:0;;
	}
	public function filter_vehicle($input){
		if(!empty($input['no_of_passenger'])){
			$this->db->where('noOfPassengers >=' , $input['no_of_passenger']);
		}
		if(!empty($input['no_of_suitcase'])){
			$this->db->where('noOfSuitcases >=' , $input['no_of_suitcase']);
		}
		if(!empty($input['vehicle_type'])){
			$this->db->where('vehicle_type' , $input['vehicle_type']);
		}
		return $this->db->get('vehicle')->result();
	}
	public function save_booking(){
		
		$this->load->helper('custom_helper');
		debug_log("model ---inside--");
		//$this->db->order_by('id','DESC');
		//$last_booking_id = $this->db->get('booking_deatils')->row('booking_id');
		//if(empty($last_booking_id)){
			$booking_id = "Book-".rand()."-".date('Y-m-d');



		//}
		$_SESSION["book_data"]['booking_id'] =$booking_id ;
	

		$this->db->insert('booking_deatils',$_SESSION["book_data"]);
	
		$result['booking_id'] = $booking_id;
		$result['status'] = $this->db->affected_rows();
		if($this->db->affected_rows() == 1){
			$customerName=$_SESSION["book_data"]['first_name'];

		if($customerName){
			debug_log("-----ONLINE OR CASH PAYMENT-- model   username and email NOT NULL");

			

			$user['name']= $_SESSION["book_data"]['first_name']." ". $_SESSION["book_data"]['last_name'];	
			$user['email']= $_SESSION["book_data"]['email'];
			$user['phone']=$_SESSION["book_data"]['phone'];
			$user['promo_code']=$_SESSION["promocode"];
			$user['amount']=	$_SESSION['total_fare'];

		
		}
		else{
			$user['name']= 'online payemnt';
			debug_log("-----ONLINE PAYMENT-- model   username and email phonenumber is NULL EMPTY--");
		
		}

					//error throwning 
				
	
		
			$this->db->insert('user',$user);
			//$user['promo_code']=
			$_SESSION["book_status"] ="success";
		}
		return $result;
		//echo "<pre>";print_r($_SESSION["book_data"]);

	}
	public function get_book_data($book_id){
		$this->db->where('booking_id',$book_id);
		return $this->db->get('booking_deatils')->row();
	}
	public function check_promo_code($promo_code){
		$this->db->where('status',1);
		$this->db->where('promo_code',$promo_code);
		$query = $this->db->get('promocodes');
		$result = $query->row();
		if($result){
			return $result;
		}else{
			return 0;
		}

	}

	public function check_promo_code_usage($promo_code,$email){

		$query = $this->db->query("SELECT * from user where email ='$email' and promo_code ='$promo_code'");

		$result = $query->row();

		if(empty($result)){
			return $result =array('status'=>'success');
		}else{
			return 0;
		}

	}
	public function check_username_exist($username){
						$this->db->where('email',$username);
		return $exist = $this->db->get('user_profile')->num_rows();
	}
	public function save_user($data){
		$this->db->insert('user_profile',$data);
		$return['effected_rows']= $this->db->affected_rows();
		$return['insert_id'] = $this->db->insert_id();
		return $return;
	}
	public function user_login($username,$password){
		$this->db->where('email',$username);
		$this->db->where('password',$password);
		return $this->db->get('user_profile')->row();
		
	}

	public function book_details($user_id,$user_type){
				$this->db->select('b.*,t.status_desc');
				$this->db->where('user_id',$user_id);
				$this->db->where('userType',$user_type);
				$this->db->order_by('id','DESC');
				$this->db->join('trip_status t','t.id=b.status');
		return $this->db->get('booking_deatils b')->result();
	}
	public function user_details($user_id,$user_type){
		if($user_type =="customer"){
			$this->db->where('user_id',$user_id);
			return $this->db->get('user_profile')->row();
		}else{
			$this->db->select('display_name as fullname');
			$this->db->where('id',$user_id);
			return $this->db->get('admin_users')->row();
		}
	
	} 
	public function book_details_by_id($booking_id){
		$this->db->select('b.*,v.title as title,t.status_desc');
		$this->db->join('vehicle v','v.vehicle_id=b.vehicle_id');
		$this->db->join('trip_status t','t.id=b.status');
		$this->db->where('b.booking_id',$booking_id);
		return $this->db->get('booking_deatils b')->row();
	}
	public function check_password($user_id,$current_password){
		$this->db->where('user_id',$user_id);
		$this->db->where('password',md5($current_password));
		 return $this->db->get('user_profile')->num_rows();
		 //echo $this->db->last_query();
	} 
	public function update_user_data($user_id,$data){
		$this->db->where('user_id',$user_id);
		$this->db->update('user_profile',$data);
		return  $this->db->affected_rows();
	}   
	public function update_booking($book_id,$data){
		$this->db->where('booking_id',$book_id);
		$this->db->update('booking_deatils',$data);
		return  $this->db->affected_rows();
	} 
	public function get_vehicle($vehicle_id){
		$this->db->where('vehicle_id',$vehicle_id);
		return $this->db->get('vehicle')->row();
	} 
	public function get_special_locations(){
		return $this->db->get('special_locations')->result();
	}
	public function check_vehicle_mapped_to_location($vehichle_id,$location_id){
			   $this->db->where('vehicle_id',$vehichle_id);
			   $this->db->where('location_id',$location_id);
		return $this->db->get('map_location')->row();
	}  
	public function admin_login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('admin_users')->row();
		
	} 
	// public function is_special_location($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo){
		public function is_special_location($source,$destination){
		// $this->db->where('lattitude',$latitudeFrom);
		// $this->db->where('longitude',$longitudeFrom);
		// $this->db->where('dest_lattitude',$latitudeTo);
		// $this->db->where('dest_longitude',$longitudeTo);
		$this->db->where('name',$source);
		$this->db->where('destination',$destination);
		 return  $this->db->get('special_locations')->row('id');
		 
		 
	}                                                                                  
}
?>