<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote extends CI_Controller
{
        public function index() {
            $nim = $this->session->userdata('nim');
            $data = array(
                'nim' => $nim,
                'status' => $pilihan
            );
            $this->db->update('mahasiswa', $data, "nim = '$nim'");
            $this->session->set_userdata('nim', '');
            redirect(base_url());
        }

        public function pilihkahim($pilihan) {
            $nim = $this->session->userdata('nim');
            $data = array(
                'nim' => $nim,
                'status' => $pilihan
            );
            $this->db->update('mahasiswa', $data, "nim = '$nim'");
            $this->session->set_userdata('nim', '');
            redirect(base_url());
        }

}