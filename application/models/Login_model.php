<?php
class Login_model extends CI_Model {
    public function getCalon() {
        return $this->db->get('calon')->result_array();
    }

    public function calonByNo() {
        return $this->db->query('SELECT * FROM `calon` ORDER BY `calon`.`no_urut` ASC')->result_array();
    }

    function insert($data)
	{
		$this->db->insert_batch('mahasiswa', $data);
	}
}
?>