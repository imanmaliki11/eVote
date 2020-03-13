<?php
class Login_model extends CI_Model {
    public function getCalon() {
        return $this->db->get('calon')->result_array();
    }
}
?>