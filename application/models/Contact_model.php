<?php
class Contact_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function save_contact($name, $email, $message, $number) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'number' => $number
        );
        return $this->db->insert('contact_us', $data);
    }
}
?>
