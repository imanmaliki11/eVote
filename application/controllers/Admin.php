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
            $data['suaramasuk'] = $this->db->get_where('mahasiswa', ['status !=' => 0 ])->num_rows();
            $data['totalpemilih'] = $this->db->get('mahasiswa')->num_rows();
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

        private function _tPemilih() {
            $data['judul'] = 'Tambah Pemilih';
            $this->load->view('template/header', $data);
            $this->load->view('home/tambahpeserta');
            $this->load->view('template/footer');
        }

        // public function addmhs() {
        //     // menghubungkan dengan library excel reader
        //     $this->load->library('excel');

        //     // upload file xls
        //     $target = basename($_FILES['filemhs']['name']) ;
        //     move_uploaded_file($_FILES['filemhs']['tmp_name'], $target);
            
        //     // beri permisi agar file xls dapat di baca
        //     chmod($_FILES['filemhs']['name'],0777);
            
        //     // mengambil isi file xls
        //     $data = new Spreadsheet_Excel_Reader($_FILES['filemhs']['name'],false,'');
        //     // menghitung jumlah baris data yang ada
        //     $jumlah_baris = $data->rowcount($sheet_index=0);
            
        //     // jumlah default data yang berhasil di import
        //     $berhasil = 0;
        //     for ($i=2; $i<=$jumlah_baris; $i++){
            
        //         // menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
        //         $nim     = $data->val($i, 1);
            
        //         if($nim != ""){
        //             // input data ke database (table data_pegawai)
        //             $this->db->query("INSERT into mahasiswa values('$nim',0);");
        //             $berhasil++;
        //         }
        //     }
            
        //     // hapus kembali file .xls yang di upload tadi
        //     unlink($_FILES['filemhs']['name']);
        //     $this->_dash();
        // }


    function import()
	{
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
			echo 'Data Imported successfully';
		}	
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