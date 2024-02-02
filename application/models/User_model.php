<?php 

class User_model extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
 	}
		
 	function getUserData($user_id = '', $user_type = ''){
 		$user_id = (empty($user_id))?$this->session->userdata('id'):$user_id;
 		$user_type = (empty($user_type))?$this->session->userdata('user_type'):$user_type;

		$result = $this->db->get_where('admin_users',array('status'=>'1','id'=>$user_id));
 		if(empty($result)){
 			return 0;
 		}
 		$result = $result->row();
		return $result;
 	}

 	function updateUser($user_id = '',$user_type = '',$user_data = array()){
 		if(empty($user_id) || empty($user_type) || empty($user_data)){
 			return 0;
 		}
 		$userIdChk = $this->db->query("SELECT * FROM admin_users as AU
 									   WHERE AU.status!='2' AND AU.id!='".$user_id."' AND 
								   			 AU.username='".$user_data['username']."'");
 		if(!empty($userIdChk) && $userIdChk->num_rows() > 0){
 			return 4;
 		}
 		$admUpArr = array('username'=>$user_data['username'],'display_name'=>$user_data['display_name']);
 		if(!empty($user_data['profile_image'])){
 			$admUpArr['profile_image'] = $user_data['profile_image'];
 		}
 		if(!empty($user_data['password'])){
 			$admUpArr['password'] = $user_data['password'];
 		}
 		$status = $this->db->update('admin_users',$admUpArr,array('id'=>$user_id));
 		if(!$status){
 			return 0;
 		}

		$usrData = $this->getUserData($user_id,$user_type);
		if(!empty($usrData)){
			$this->session->set_userdata('user',$usrData);
			$this->session->set_userdata('shopper_data',$usrData->shopper_data);
			$this->session->set_userdata('mechanic_shop_data',$usrData->mechanic_shop_data);
		}
 		return $status;
 	}
	 public function AllUsers(){
		 return $this->db->get('admin_users')->result();
	 }
	 public function is_user_exist($input){
					 $this->db->where('username',$input['username']);
        return $is_exist = $this->db->get('admin_users')->num_rows();
	 }
	 public function save_user($input){
		 		
		$save['username'] = $input['username'];
		$save['password'] = md5($input['password']);
		$save['display_name'] = $input['displayname'];
		$save['user_type'] = $input['user_type'];
		$save['email'] = $input['email'];
		$save['status'] =1;
		$this->db->insert('admin_users',$save);
		return $this->db->affected_rows();

	}
	public function get_user_data($id){
		$this->db->where('id',$id);
		return $this->db->get('admin_users')->row();
	}
	public function delete_user($userid){
		$this->db->where('id',$userid);
		$this->db->delete('admin_users');
	}
	public function change_user_status($data){
		$this->db->where('id',$data['id']);
		$this->db->set('status',$data['status']);
		$this->db->update('admin_users');
	}
	public function update_user_password($data){
		$this->db->where('id',$data['id']);
		$this->db->set('password',md5($data['password']));
		$this->db->update('admin_users');

	}
}
?>