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

        public function hitungpilih($a) {
            return $this->db->get_where('mahasiswa', ['status' => $a ])->num_rows();
        }

        public function ceklogin() {
            $uname = $this->input->post('uname');
            $pass = $this->input->post('pass');

            if($uname == "hmsadmin" && $pass == "evote000") {
                $this->session->set_userdata('admin', 1);
                redirect('Admin');
            } else {
                if($uname != "hmsadmin" )$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Salah!</div>');
                else $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('Admin');
            }
        }

        private function _dash(){
            $data['judul'] = 'Dashboard';
            $data['suaramasuk'] = $this->db->get_where('mahasiswa', ['status !=' => 0 ])->num_rows();
            $data['totalpemilih'] = $this->db->get('mahasiswa')->num_rows();
            $data['calon'] = $this->db->query('SELECT * FROM `calon` ORDER BY `calon`.`no_urut` ASC')->result_array();
            $data['jcalon'] = $this->db->get('calon')->num_rows();
            $data['satu'] = $this->db->get_where('mahasiswa', ['status' => 1 ])->num_rows();
            $data['dua'] = $this->db->get_where('mahasiswa', ['status' => 2 ])->num_rows();
            $data['tiga'] = $this->db->get_where('mahasiswa', ['status' => 3 ])->num_rows();
            
            $this->load->view('template/header', $data);
            $this->load->view('home/dashboard', $data);
            $this->load->view('template/footer');
        }

        public function tPemilih(){
            if (($this->session->userdata('admin')) == null) {
                $data['judul'] = 'Login Admin';
                $this->load->view('template/header', $data);
                $this->load->view('login/admin');
                $this->load->view('template/footer');
            } else {
                $this->_tPemilih();
            }
        }

        public function tCalon() {
            if (($this->session->userdata('admin')) == null) {
                $data['judul'] = 'Login Admin';
                $this->load->view('template/header', $data);
                $this->load->view('login/admin');
                $this->load->view('template/footer');
            } else {
                $this->_tCalon();
            }
        }

        private function _tPemilih() {
            $data['judul'] = 'Tambah Pemilih';
            $this->load->view('template/header', $data);
            $this->load->view('home/tambahpeserta');
            $this->load->view('template/footer');
        }

        private function _tCalon() {
            $data['calon'] = $this->db->query('SELECT * FROM `calon` ORDER BY `calon`.`no_urut` ASC')->result_array();
            $data['judul'] = 'Tambah Calon';
            $this->load->view('template/header', $data);
            $this->load->view('home/tambahcalon');
            $this->load->view('template/footer');
        }

        public function tCalonAction() {
            $nama = $this->input->post('nama');
            $nim = $this->input->post('nim');
            //$nourut = $this->input->post('nourut');
            $nourut =  count($this->db->query('SELECT * FROM `calon` ORDER BY `calon`.`no_urut` ASC')->result_array());
            $nourut += 1;
            $foto = $this->input->post('foto');

            if($foto=''){
                echo "Upload Gagal"; die();
            }else{
                $config['upload_path'] = './assets/img';
                $config['allowed_types'] = 'jpg|png|gif';
                $this->load->library('upload',$config);

                if(!$this->upload->do_upload('foto')) {
                    echo "Upload Gagal"; die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama' => $nama,
                'nim' => $nim,
                'no_urut' => $nourut,
                'foto' => $foto,
            );
            $this->db->insert('calon', $data);
            $this->_tCalon();
        }
  
        public function import() {
            $this->load->library('excel');
            if(isset($_FILES["filemhs"]["name"]))
            {
                $path = $_FILES["filemhs"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $nim = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $data[] = array(
                            'nim'		=>	$nim,
                            'status' => 0
                        );
                    }
                }
                $this->db->insert_batch('mahasiswa', $data);
                $this->_dash();
            }	
        }

        public function hapus() {
            $id = $this->input->post('id');
            $this->db->query("DELETE FROM `calon` WHERE `calon`.`no_urut` = '$id'");
            redirect('Admin/tCalon');
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