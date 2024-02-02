<?php 
class VehicleTypeModel extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
	}
	
	public function createVehicleType($vehicle_data = array()){
		$vehicle_data['status']=1;
		$result=$this->db->insert('vehicle_type',$vehicle_data);
		$last_id= $this->db->insert_id();
		$res=$this->db->query("SELECT id from vehicle_type where id=$last_id");
		$pro=$res->row();
		return $result;
	}
	
	function getVehicle($id=''){
		if(empty($id)){	
			$sql =$this->db->query("SELECT VH.*
								FROM vehicle_type AS VH
								WHERE  VH.status='1'");
			$vehicleData = $sql->result();
			return $vehicleData;
		}
		if(!empty($id)){
			$result =$this->db->query("SELECT VH.*
			                        FROM vehicle_type AS VH
								    WHERE VH.id=$id and VH.status='1'");
            $val=$result->result();
           // print_r($val);exit;
			if(empty($val)){
				return $val;
			}
			return (empty($id))?$result->result():$result->row();
	
		}
		
	}
	
	public function changeStatus($id,$status = '0'){
		if(empty($id)){
			return 0;
		}
		$status = $this->db->update('vehicle_type',array('status'=>$status), array('id'=>$id));
		return $status;
	}
	
	function updateVehicle($vehicle_id = '', $vehicle_data = array()){
		if(empty($vehicle_id) || empty($vehicle_data)){
			return 0;
		}
		$status = $this->db->update('vehicle_type',$vehicle_data,array('id'=>$vehicle_id));
		return ($status)?1:0;
	}
	function getVehicleData($id,$view_all = 0){
		$cond = ($view_all != 0)?' VH.status IN (0,1) ':' VH.status IN (1) ';
		$cond .= (!empty($id))?" AND VH.id = '$id[id]'":"";
		$result =$this->db->query("SELECT VH.*
			                        FROM vehicle_type AS VH
								    WHERE $cond");
		$val=$result->result();
		if(empty($val)){
			return;
		}
		return (empty($vehicle_id))?$result->result():$result->row();
	}
	public function getVehicleType(){
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