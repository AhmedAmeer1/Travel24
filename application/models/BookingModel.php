<?php 
class BookingModel extends CI_Model {
  
  public function _consruct(){
    parent::_construct();
  }
  
  public function getBookingDetails($view_all=''){
      $this->db->select("BK.*,CUST.title,CONCAT(BK.first_name , ' ' , BK.last_name) as Name ");
      $this->db->from('booking_deatils AS BK');
      $this->db->join('vehicle AS CUST','CUST.vehicle_id = BK.vehicle_id');
      $this->db->order_by("BK.id",'DESC');
      $result = $this->db->get()->result();
      if(!empty($result)){
        return $result;
      }
    }
  
  public function changebookingStatus($b_id = array(), $status = '0'){
		if(empty($b_id)){
			return 0;
		}
    if($status == 5){
      $book_details = $this->getBgDetails($b_id);
      $msg = "Wow ".$book_details->first_name.' '.$book_details->last_name."! <br><br>
              I'm so glad we were able to take good care of you! Would you be willing to share your experience with other customers? They'd be very interested in hearing your experience and listening to what you have to say.<br><br>
              You can share here: <a href=".base_url()."Reviews/addReview/".encode_param($book_details->id).">Please Click</a> <br><br>
              You're amazing either way. <br><br>
              Best, <br>
              Nolimit Cars";

      newEmailFunction($book_details->email,$msg);
    }
		$status = $this->db->query("update booking_deatils set status = '$status' where id in ($b_id)");
		return $status;
  }
  
  function getBgDetails($id = '',$view_all = 0){

    $cond = ($view_all != 0)?' VK.status IN (0,1) ':' VK.status IN (1) ';
		$cond .= (!empty($id))?" AND BK.id = $id ":"";
	
		$result = $this->db->query("SELECT BK.*,VK.title FROM booking_deatils as BK 
                                left join vehicle as VK on VK.vehicle_id = BK.vehicle_id  WHERE $cond");
		$val=$result->result();
		if(empty($val)){
			return;
		}
		return (empty($id))?$result->result():$result->row();
	}
    
   
}
?>