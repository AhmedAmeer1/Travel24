<?php 
class CompanyModel extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
	}
	
	public function createCompany($company_data = array()){
		if(empty($company_data)){
			return 0;
		}
		$company_data['status']=1;
		$status = $this->db->insert('company',$company_data);
		return ($status)?1:0;;
	}
	
	public function getCompany($company_id=''){
		if(!empty($company_id)){
			$result = $this->db->query("SELECT company.* FROM company WHERE company_id=$company_id");
			return $result->result();
		}
		$this->db->where('status=',1);
		$this->db->select("company_id,company_name,status");
		$this->db->from('company');
		$result = $this->db->get()->result();
		if(!empty($result)){
			return $result;
		}
	}

	function updateCompany($company_id = '', $company_data = array()){
		if(empty($company_id) || empty($company_data)){
			return 0;
		}

		$status = $this->db->update('company',$company_data,array('company_id'=>$company_id));
		return ($status)?1:0;
	}

	public function changeStatus($company_id,$status = '0'){
		if(empty($company_id)){
			return 0;
		}
		$status = $this->db->update('company',array('status'=>$status), array('company_id'=>$company_id));
		return $status;
	}

	public function getCompanyData($company_id=''){
		if(!empty($company_id)){
			$cond = (!empty($company_id))?" company_id = '$company_id'":"";
			$result = $this->db->query("SELECT * from company  where status!=2 and $cond");	
			$re = $result->result();
		
			if(!empty($re)){
				return (empty($company_id))?$result->result():$result->row();
				
			}
			
		}
		$result = $this->db->query("SELECT * from company where status!=2");	
		$re = $result->result();
		return $re;	
	}
	
}


