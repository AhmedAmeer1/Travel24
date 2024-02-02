<?php 
class Dashboard_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}

 	public function gettotalvechicle(){
		//  if($this->session->userdata('user_type') == 1){
			$result = $this->db->get('vehicle')->result();
			return count($result);
		 //}
		// else{
		// 	$id = $this->session->userdata('id');
		// 	$result = $this->db->query("SELECT VH.*,CM.company_name
		// 	FROM vehicle AS VH
		// 	LEFT JOIN company AS CM ON (VH.company_id=CM.company_id AND CM.status='1");
		// 	$res=$result->result();
		// 	return count($res);
		// }		
	 }
	public function getSalesReportCount(){
		$query = $this->db->query("SELECT COUNT(ORDS.order_id) AS count FROM `orders` AS `ORDS` WHERE `ORDS`.`status` = '1'");
		$result = array();
		if(empty($query) || $query->num_rows < 0 || empty($query = $query->result_array())){
			return $result;
		}
		foreach($query as $value){
			$result[] = array('item1'=>$value['count']);
		}
	   return json_encode($result);
	}

    public function gettotalcustomers(){

	//	if($this->session->userdata('user_type') == 1){
			$result = $this->db->get('user_profile')->result();
			return count($result);
		//}	
	}

	public function gettotalbooking(){
	//	if($this->session->userdata('user_type') == 1){
			$result = $this->db->get('booking_deatils')->result();
			return count($result);
		//}	

	}

	public function gettotalcompany(){
		//if($this->session->userdata('user_type') == 1){
			$result = $this->db->get('company')->result();
			return count($result);
		//}		
	}

    }
    ?>