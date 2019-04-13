<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_warga extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_warga');
        
    }

    public function input_warga(){
        $nik            = $this->input->post('nik');
        $nama           = $this->input->post('nama');
        $telp           = $this->input->post('telp');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $kendaraan      = $this->input->post('kendaraan');
        $agama          = $this->input->post('agama');
        $jk             = $this->input->post('jk');
        $status        = $this->input->post('status');
        $hubungan       = $this->input->post('hubungan');
        $paspor         = $this->input->post('paspor');
        
        $this->form_validation->set_rules([
            [
                'field' => 'nik',
                'label' => 'NIK', 
                'rules' => 'trim|required|is_unique[warga.nik]|numeric'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama Lengkap', 
                'rules' => 'trim|required|alpha'
            ],
            [
                'field' => 'telp',
                'label' => 'Nomor Telepon/HP', 
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir', 
                'rules' => 'trim|required|regex_match[/^[a-zA-Z]/]'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir', 
                'rules' => 'required'
            ],
            [
                'field' => 'kendaraan',
                'label' => 'Kendaraan', 
                'rules' => 'trim|numeric'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama', 
                'rules' => 'required'
            ],
            [
                'field' => 'jk',
                'label' => 'Jenis Kelamin', 
                'rules' => 'required'
            ],
            [
                'field' => 'hubungan',
                'label' => 'Hubungan Dalam Keluarga', 
                'rules' => 'required'
            ],
            [
                'field' => 'paspor',
                'label' => 'Nomor paspor', 
                'rules' => 'trim|regex_match[/^[0-9]/]'
            ],
        ]);

        
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg';
        $config['max_size']  = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('foto')){
            $this->upload->display_errors();
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            echo "success";
        }
        
        
    }
    public function input_pendidikan(){
        $nama           = $this->input->post('nama');
        $riwayat        = $this->input->post('riwayat_pend');
        $nama_sekolah   = $this->input->post('nama_sekolah');
        $alamat_sekolah + $this->input->post('alamat_sekolah');
        
        $this->form_validation->set_rules([
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'riwayat_pend',
                'label' => 'Riwayat Pendidikan',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_sekolah',
                'label' => 'Nama Sekolah/Universitas',
                'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9]/]'
            ],
            [
                'field' => 'alamat_sekolah',
                'label' => 'Alamat Sekolah/Universitas',
                'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9]/]'
            ]
        ]);
        if ($this->form_validation->run() == TRUE or FALSE) {
            $this->load->view('user/data_keluarga');
        } else {
            $isi = $this->m_user->data_pendidikan(
                array(
                    'nama' => $nama,
                    'almameter' => $riwayat,
                    'nama_sekolah' => $nama_sekolah,
                    'alamat_sekolah' => $alamat_sekolah
                )
            );
        }
        
    }
    public function input_pekerjaan(){

    }
    public function insert_kk(){
        
        
    }
}
/* End of file C_warga.php */
?>