<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
        public function index() {
            if (($this->session->userdata('admin')) == null) {
                $data['judul'] = 'Login Admin';
                $this->load->view('template/header', $data);
                $this->load->view('login/admin');
                $this->load->view('template/footer');
            } else {
                $this->_dash();
            }
        }

        public function ceklogin() {
            $uname = $this->input->post('uname');
            $pass = $this->input->post('pass');

            if($uname == "hmsadmin" && $pass == "admin123") {
                $this->session->set_userdata('admin', 1);
                redirect('Admin');
            }
        }

        private function _dash(){
            $data['judul'] = 'Dashboard';
            $data['nilai'] = $this->db->get_where('mahasiswa', ['status' => 0 ])->num_rows();
            $this->load->view('template/header', $data);
            $this->load->view('home/dashboard', $data);
            $this->load->view('template/footer');
        }

        public function logout() {
            $this->session->set_userdata('admin', '');
            redirect('Admin');
        }

        public function reset() {
            if (($this->session->userdata('admin')) == null) {
                $this->index();
            } else {
                $data = $this->db->get('mahasiswa')->result_array();
                foreach($data as $val) {
                    $ins = array(
                        'nim' => $val['nim'],
                        'status' => 0
                    );
                    $nim = $val['nim'];
                    $this->db->update('mahasiswa', $ins, "nim = '$nim'");
                }
                redirect('Admin');
            }
        }
}
?>