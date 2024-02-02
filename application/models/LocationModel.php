<?php 
class LocationModel extends CI_Model {
	
	public function _consruct(){
		parent::_construct();
	}
    public function add_new_location($data){
        $input['name'] = $data['location'];
        $input['lattitude'] = $data['latitude'];
        $input['longitude'] = $data['longitude'];
        $input['destination'] = $data['location2'];
        $input['dest_lattitude'] = $data['dest_latitude'];
        $input['dest_longitude'] = $data['dest_longitude'];
        
        $this->db->insert('special_locations',$input);
    }
    public function delete_location($id){
        $this->db->where('id',$id);
        $this->db->delete('special_locations');
    }
    public function get_locations(){
       return  $this->db->get('special_locations')->result();
    }
    public function map_new_location($data){
        $input['location_id'] = $data['location'];
        $input['price_single'] = $data['price'];
        $input['vehicle_id'] = $data['vehicle'];
        $input['price_return'] = $data['price_return'];
                       $this->db->where('location_id',$input['location_id']);
                       $this->db->where('vehicle_id',$input['vehicle_id']);
        $check_exist = $this->db->get('map_location')->num_rows();
        if($check_exist > 0){
            $msg ="This Vehicle already mapped with this location";
        }else{
            $this->db->insert('map_location',$input);
            $msg ="Location map with vehicle successfully";
        }
        return $msg;
        
    }
    public function get_mapped_location(){
                $this->db->select('v.title as vehicle,s.name as location,s.destination as destination,m.*');
                $this->db->join('vehicle AS v','v.vehicle_id = m.vehicle_id');
                $this->db->join('special_locations AS s','s.id = m.location_id');
         return $this->db->get('map_location m')->result();
    }
    public function delete_location_mapping($id){
        $this->db->where('id',$id);
        $this->db->delete('map_location');
    }
    

	
}


