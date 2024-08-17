<?php
class Populardestinations extends CI_Controller {

    private $destinations;
    private $fleet_data;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Europe/London');
        $this->load->model('Index_Model');
        $this->load->helper('cookie');
        $this->load->helper('custom_helper');
        $this->load->model('Review_Model');
        $this->load->config('destinations'); // Load the config file
        $this->load->config('fleet_data'); // Load the config file
        $this->destinations = $this->config->item('destinations'); // Get the data from the config file
        $this->fleet_data = $this->config->item('fleet_data'); // Get the data from the config file
    }

    public function index() {
        $data['destinations'] = $this->destinations;
        $data['fleet_data'] = $this->fleet_data;
        $this->load->view('popularDestinations', $data);
    }

    public function view($slug = NULL) {
        $this->session->sess_destroy();

        if (!isset($_SESSION)) {
            session_start();
        }

        $blog = NULL;

        foreach ($this->destinations as $b) {
            if ($b['slug'] === $slug) {
                $blog = $b;
                break;
            }
        }

        if ($blog === NULL) {
            show_404();
        }

        $home_template['title'] = $this->db->get('settings')->row('title');
        $home_template['result'] = $this->db->get('settings')->row();
        $this->db->where('v.status', 1);
        $this->db->order_by('vt.sort_order', 'ASC');
        $this->db->join('vehicle_type vt', 'vt.id=v.vehicle_type');
        $home_template['fleet'] =  $this->fleet_data;
        $home_template['data'] = "Home page";
        $home_template['blog'] = $blog;

        $this->load->view('destination-view', $home_template);
    }
}
?>
