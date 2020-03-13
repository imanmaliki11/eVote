<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

        public function index()
        {
                $this->form_validation->set_rules('nim', 'Uname', 'required', [
                        'required' => 'Data required'
                ]);
                $this->form_validation->set_rules('password', 'Pass', 'required', [
                        'required' => 'Data required'
                ]);
                if ($this->form_validation->run() == false) {
                        $data['judul'] = "E-VOTE KAHIM";
                        $this->load->view('template/header', $data);
                        $this->load->view('login/login');
                        $this->load->view('template/footer');
                } else {
                        $this->_login();
                }
        }

        private function _login() {
                $nim = $this->input->post('nim');
                $pass = $this->input->post('password');
                $var = $this->db->get_where('mahasiswa', ['nim' => $nim])->row();
                if($var) {
                        if($var->sandi == $pass) {
                                $data['judul'] = "VOTE YOUR LEADER";
                                $this->load->view('template/header', $data);
                                $this->load->view('home/pilih', $var);
                                $this->load->view('template/footer');
                        } else {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                invalid password!
                                </div>');
                                $data['judul'] = "E-VOTE KAHIM";
                                $this->load->view('template/header', $data);
                                $this->load->view('login/login');
                                $this->load->view('template/footer');
                        }
                } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                invalid username!
                                </div>');
                                $data['judul'] = "E-VOTE KAHIM";
                                $this->load->view('template/header', $data);
                                $this->load->view('login/login');
                                $this->load->view('template/footer');
                }
        }

        public function logout() {
                //$this->session->sess_destroy();
                //redirect(base_url());
        }

}
