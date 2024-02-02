<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Europe/London');
        $this->load->model('VehicleModel');
        $this->load->model('CompanyModel');
        $this->load->model('LocationModel');
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url('Login'));
        }
        
    }
    
    public function addLocation(){
        $template['page'] = 'Location/addLocation';
        $template['pTitle'] = "Add Location";
        $template['pDescription'] = "Add Location"; 
        $template['menu'] = "Location Management";
        $template['smenu'] = "Location";
         $template['result'] = $this->db->get('settings')->row();
        $template['location'] = $this->db->get('special_locations')->result();

        $this->load->view('template',$template);
    }
    public function save_new_location(){
        
        $this->LocationModel->add_new_location($_POST);
        
    }
    public function delete_location($id){
        $id = decode_param($id);
        $this->LocationModel->delete_location($id);
        redirect('Location/addLocation'); 
    }
    public function mapLocation(){
        $template['page'] = 'Location/mapLocation';
        $template['pTitle'] = "Map Location";
        $template['pDescription'] = "Map Location"; 
        $template['menu'] = "Location Management";
        $template['smenu'] = "Location";
        $template['result'] = $this->db->get('settings')->row();
        $template['location'] = $this->db->get('special_locations')->result();
                               $this->db->where('status',1);
        $template['vehicle'] = $this->db->get('vehicle')->result();
        $template['mapped_locations'] = $this->LocationModel->get_mapped_location();
       $this->load->view('template',$template);
    }
    public function save_new_location_mapping(){
       $result =  $this->LocationModel->map_new_location($_POST);
       echo $result;
    }
    public function delete_location_mapping($id){
        $id = decode_param($id);
        $this->LocationModel->delete_location_mapping($id);
        redirect('Location/mapLocation'); 
    }
  

}
?>
