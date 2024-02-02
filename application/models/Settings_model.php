<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
	}
	
	
	function settings_viewing(){
		
		$query = $this->db->query(" SELECT * FROM `settings` order by id DESC ");
		if(!empty($query)){
			return $query->row_array();
		}
		return;
	}
	

	public function update_settings($data){
	//	echo "<pre>";print_r($data);exit;
		$result = $this->db->update('settings', $data); 
		return $result;
	}
	
	
}
?>