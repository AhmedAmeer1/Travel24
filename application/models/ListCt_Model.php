<?php
class ListCt_Model extends CI_Model{
	public function _construct(){
		parent::_construct();
	}
	public function Search($data){
			$data['status']=1;
			$status = $this->db->insert('booking',$data);
			$res = array('status'=>1,'data'=>'');
			return ($status)?1:0;;
	}	
	
}
?>