<?php
class Review_Model extends CI_Model{
	public function _construct(){
		parent::_construct();
	}

	public function addReview($data){
		$result = $this->db->get_where('reviews',array('trip_id'=>$data['trip_id'],'userId'=>$data['userId']));
		if(empty($result) ||  $result->num_rows() <= 0 ){
			$status = $this->db->insert('reviews',$data);
			return 1;
		}
		return 0;
	}

	public function getAllReviews($type = ''){
		$cond = ($type == 1) ? " ORDER BY RVS.id DESC LIMIT 0,4 " : "";
	
		$this->db->select("RVS.*, BK.first_name, BK.last_name");
      	$this->db->join('booking_deatils AS BK','BK.id = RVS.trip_id');
		$result = $this->db->get('reviews AS RVS')->result_array();
		$result = $this->db->query("SELECT RVS.*, BK.first_name, BK.last_name
									FROM reviews AS RVS
									INNER JOIN booking_deatils AS BK ON BK.id = RVS.trip_id $cond");
		return array('status'=>'success','data'=>$result->result_array());
	}

	public function getReviewById($id){
		$result = $this->db->query("SELECT RVS.*, BK.first_name, BK.last_name, UP.phone_no, UP.email 
									FROM reviews AS RVS
									INNER JOIN booking_deatils AS BK ON BK.id = RVS.trip_id 
									LEFT JOIN user_profile AS UP ON BK.user_id = UP.user_id 
									WHERE RVS.id =".$id);
		return $result->row_array();
	}

	public function getReviewDetails(){

		$result = $this->db->query("SELECT COUNT(*) AS TOTAL, COUNT(if(rating='1',1,NULL)) AS ONE, COUNT(if(rating='2',1,NULL)) AS TWO, COUNT(if(rating='3',1,NULL)) AS THREE, COUNT(if(rating='4',1,NULL)) AS FOUR, COUNT(if(rating='5',1,NULL)) AS FIVE  FROM reviews");

		return $result->row_array();
	}

}
?>