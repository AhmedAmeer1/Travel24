<?php 
class VehicleModel extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
	}
	
	public function createVehicle($vehicle_data = array()){
		//print_r($vehicle_data);exit;
		$vehicle_data['status']=1;
		$result=$this->db->insert('vehicle',$vehicle_data);
		$last_id= $this->db->insert_id();
		$res=$this->db->query("SELECT vehicle_id from vehicle where vehicle_id=$last_id");
		$pro=$res->row();
		//print_r($pro);exit;
		return $result;
	}
	
	function getVehicle($vehicle_id=''){
		if(empty($vehicle_id)){	
			$sql =$this->db->query("SELECT VH.*,CM.company_name,VT.type,VT.sort_order 
								FROM vehicle AS VH
								LEFT JOIN vehicle_type AS VT ON  VH.vehicle_type=VT.id 
								LEFT JOIN company AS CM ON (VH.company_id=CM.company_id 
								AND CM.status='1')
								WHERE  VH.status='1' ORDER BY VT.sort_order ASC");
			$vehicleData = $sql->result();
			//echo $this->db->last_query();exit;
			return $vehicleData;
		}
		if(!empty($vehicle_id)){
			$result =$this->db->query("SELECT VH.*,CM.company_name,VT.type,VT.sort_order 
			                        FROM vehicle AS VH
			                        LEFT JOIN vehicle_type AS VT ON  VH.vehicle_type=VT.id 
									LEFT JOIN company AS CM ON (VH.company_id=CM.company_id 
									AND CM.status='1')
								    WHERE VH.vehicle_id=$vehicle_id and VH.status='1' ORDER BY VT.sort_order ASC");
			$val=$result->result();
			//print_r($val);exit;
			if(empty($val)){
				return $val;
			}
			return (empty($vehicle_id))?$result->result():$result->row();
	
		}
		
	}
	
	public function changeStatus($vehicle_id,$status = '0'){
		if(empty($vehicle_id)){
			return 0;
		}
		$status = $this->db->update('vehicle',array('status'=>$status), array('vehicle_id'=>$vehicle_id));
		return $status;
	}
	
	function updateVehicle($vehicle_id = '', $vehicle_data = array()){
		if(empty($vehicle_id) || empty($vehicle_data)){
			return 0;
		}
		$status = $this->db->update('vehicle',$vehicle_data,array('vehicle_id'=>$vehicle_id));
		return ($status)?1:0;
	}
	function getVehicleData($vehicle_id,$view_all = 0){
		$cond = ($view_all != 0)?' VH.status IN (0,1) ':' VH.status IN (1) ';
		$cond .= (!empty($vehicle_id))?" AND VH.vehicle_id = '$vehicle_id[vehicle_id]'":"";
		$result =$this->db->query("SELECT VH.*,CM.company_name,VT.type
			                        FROM vehicle AS VH
									LEFT JOIN vehicle_type AS VT ON  VH.vehicle_type=VT.id 
									LEFT JOIN company AS CM ON (VH.company_id=CM.company_id 
									AND CM.status='1')
								    WHERE $cond");
		$val=$result->result();
		//print_r($val);exit;
		if(empty($val)){
			return;
		}
		return (empty($vehicle_id))?$result->result():$result->row();
	}
	public function getVehicleType(){
		$this->db->where("status",1);
		$this->db->select("id,type");
		$this->db->from('vehicle_type');
		$result = $this->db->get()->result();
		//print_r($result);exit;
		if(!empty($result)){
			return $result;
		}
	}
	
}
?>