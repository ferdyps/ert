<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pro_user extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model("m_warga");
            $this->load->library('form_validation');
            
            if(!$this->session->has_userdata('status')){
                redirect('pro_login/','refresh');
            } else {
                if ($this->session->userdata('akses') == 'admin') {
                    redirect('pro_admin/','refresh');
                }
            }
            // $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");
        }
// ====================================================================================================        
        public function cek_aja_sih(){
            $id_user = $this->session->userdata('user_id');
            $hasil = $this->m_warga->select_data('kartu_keluarga', 'id_user', $id_user)->row();
            print_r($hasil);
        }
// ====================================================================================================
        public function index(){
            $id_user = $this->session->userdata('user_id');
            $data_warga_suami = $this->m_warga->cek_data_warga_punya_kepala_keluarga($id_user)->row()->jml;

            $data_kk = $this->m_warga->select_data('kartu_keluarga', 'id_user', $id_user)->row();
            $data_warga = $this->m_warga->select_data('warga', 'id_user', $id_user)->row();

            $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");

            $this->form_validation->set_rules([
                [
                    'field' => 'nik',
                    'label' => 'NIK', 
                    'rules' => 'trim|required|is_unique[warga.nik]|numeric'
                ],
                [
                    'field' => 'nama',
                    'label' => 'Nama Lengkap', 
                    'rules' => 'trim|required|regex_match[/^[a-zA-Z]/]'
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
                    'rules' => 'trim|numeric|is_natural'
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
                    'rules' => 'trim|numeric'
                ],
            ]);

            if ($this->input->post('submit')) {
                
                $nik            = $this->input->post('nik');
                $nama           = $this->input->post('nama');
                $telp           = $this->input->post('telp');
                $tempat_lahir   = $this->input->post('tempat_lahir');
                $tgl_lahir      = $this->input->post('tanggal_lahir');
                $kendaraan      = $this->input->post('kendaraan');
                $agama          = $this->input->post('agama');
                $jk             = $this->input->post('jk');
                $status         = $this->input->post('status');
                $hub_dlm_kel    = $this->input->post('hubungan');
                $paspor         = $this->input->post('paspor');

                if ($this->form_validation->run() == TRUE) {

                    $data = array(
                        'no_kk' => $data_kk->no_kk,
                        'nik' => $nik,
                        'nama' => $nama,
                        'telp' => $telp,
                        'tempat_lahir' => $tempat_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'jml_kendaraan' => $kendaraan,
                        'agama' => $agama,
                        'jk' => $jk,
                        'status' => $status,
                        'hub_dlm_kel' => $hub_dlm_kel,
                        'no_paspor' => $paspor,
                        'id_user' => ($data_warga_suami < 1) ? $id_user : NULL
                    );

                    if ($_FILES['foto']['name'] == "") {
                        $data['id_kepala_keluarga'] = ($data_warga_suami < 1) ? NULL : $data_warga->nik ;
                        $query = $this->m_warga->input_data('warga', $data);
                        var_dump($query);

                        if ($query) {
                            ?>
                            <script>
                                alert("Data Warga berhasil ditambah..");
                                location = "<?= base_url('pro_user'); ?>";
                            </script>
                            <?php
                        } else {
                            ?>
                            <script>
                                alert("Data Warga gagal ditambah..!");
                                location = "<?= base_url('pro_user'); ?>";
                            </script>
                            <?php
                        }
                    } else {
                        $config['upload_path'] = './uploads/';
                        $config['allowed_types'] = 'jpg';
                    
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('foto')){
                            ?>
                            <script>
                                alert("<?= $this->upload->display_errors(); ?>");
                                location = "<?= base_url('pro_user'); ?>";
                            </script>
                            <?php
                        } else {
                            $data_gambar = $this->upload->data();
                            $foto = $data_gambar['file_name'];

                            $data['foto'] = $foto;
                            $data['id_kepala_keluarga'] = ($data_warga_suami < 1) ? NULL : $data_warga->nik ;
                            $query = $this->m_warga->input_data('warga', $data);
                            var_dump($query);

                            if ($query) {
                                ?>
                                <script>
                                    alert("Data Warga berhasil ditambah..");
                                    location = "<?= base_url('pro_user'); ?>";
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert("Data Warga gagal ditambah..!");
                                    location = "<?= base_url('pro_user'); ?>";
                                </script>
                                <?php
                            }
                        }
                    }
                } else {
                    // echo "a";
                    // echo validation_errors();
                    $data['title'] = 'Data Keluarga';
                    $data['content'] = 'user/data_keluarga';
                    $data['data_suami_ada'] = ($data_warga_suami < 1) ? FALSE : TRUE;
                    $this->load->view('user/index', $data);
                }
            } else {
                // echo "b";
                $data['title'] = 'Data Keluarga';
                $data['content'] = 'user/data_keluarga';
                $data['data_suami_ada'] = ($data_warga_suami < 1) ? FALSE : TRUE;
                $this->load->view('user/index', $data);
            }
        }
// ====================================================================================================
        public function pendidikan(){
            $id_user = $this->session->userdata('user_id');

            $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");

            $cek = $this->m_warga->select_data('warga', 'id_user', $id_user)->row();
            
            if ($cek->valid == 0) {
                ?>
                <script>
                    alert('Data warga belum Valid..');
                    location = "<?= base_url('pro_user'); ?>";
                </script>
                <?php
            } else {
                $data['title'] = 'Data Pendidikan';
                $data['content'] = 'user/pendidikan';
                $data['warga'] = $this->m_warga->select_data('warga', 'id_user', $id_user)->row();
                $this->load->view('user/index', $data);

                $this->form_validation->set_rules([
                    [
                        'field' => 'riwayat_pendidikan',
                        'label' => 'Riwayat Pendidikan',
                        'rules' => 'required'
                    ],
                    [
                        'field' => 'nama_sekolah',
                        'label' => 'Nama Sekolah',
                        'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9]/]'
                    ],
                    [
                        'field' => 'alamat_sekolah',
                        'label' => 'Alamat Sekolah',
                        'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9,]/]'
                    ],
                ]);

                if ($this->input->post()) {
                    $nama_lengkap       = $this->input->post('nama_lengkap');
                    $riwayat_pendidikan = $this->input->post('riwayat_pendidikan');
                    $nama_sekolah       = $this->input->post('nama_sekolah');
                    $alamat_sekolah     = $this->input->post('alamat_sekolah');
                    
                    
                    if ($this->form_validation->run() == TRUE) {
                        $data = array(
                            'almameter'    => $riwayat_pendidikan,
                            'nama_sekolah'  => $nama_sekolah,
                            'alamat_sekolah'=> $alamat_sekolah
                        );
                        $insertdata = $this->m_warga->input_data('pendidikan',$data);
                        if ($insertdata) {
                            ?>
                            <script>
                                alert('Data Berhasil Diinputkan');
                                location = "<?php base_url('pro_user/pendidikan');?>";
                            </script>
                            <?php
                        }else {
                            ?>
                            <script>
                                alert('Data Gagal Diinputkan');
                                location = "<?php base_url('pro_user/pendidikan');?>";
                            </script>
                            <?php
                        }
                    } else {
                        $data['title'] = 'Data Pendidikan';
                        $data['content'] = 'user/pendidikan';
                        $this->load->view('user/index', $data);
                    }
                    
                }
            }
        }
// ====================================================================================================
        public function pekerjaan(){
            $id_user = $this->session->userdata('user_id');

            $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");

            $cek = $this->m_warga->select_data('warga', 'id_user', $id_user)->row();
            if ($cek->valid == 0) {
                // ?>
                 <!-- <script>
                //     alert('Data warga belum Valid..');
                //     location = "<?= base_url('pro_user'); ?>";
                // </script> --> 
                 <?php
            } else {
                $data['title'] = 'Pekerjaan';
                $data['content'] = 'user/pekerjaan';
                $data['data_pekerjaan'] = $this->m_warga->select_data('warga', 'id_user', $id_user)->row();
                $this->load->view('user/index', $data);

                $this->form_validation->set_rules([
                    [
                        'field' => 'status_pekerjaan',
                        'label' => 'Pekerjaan',
                        'rules' => 'required'
                    ],
                    [
                        'field' => 'nama_perusahaan',
                        'label' => 'Nama Perusahaan',
                        'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9]/]'
                    ],
                    [
                        'field' => 'alamat_perusahaan',
                        'label' => 'Alamat Pekerjaan',
                        'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9]/]'
                    ]
                ]);
                if ($this->input->post()) {
                    $nama = $this->input->post('nama');
                    $status_pekerjaan = $this->input->post('status_pekerjaan');
                    $nama_perusahaan = $this->input->post('nama_perusahaan');
                    $alamat_perusahaan = $this->input->post('alamat_perusahaan');
                    
                    
                    if ($this->form_validation->run() == TRUE) {
                        $data = array(
                            'nama' => $nama,
                            'status_pekerjaan' => $status_pekerjaan,
                            'nama_perusahaan' => $nama_perusahaan,
                            'alamat_perusahaan' => $alamat_perusahaan
                        );
                        $insertdata = $this->m_warga->input_data('pekerjaan',$data);
                        if ($insertdata) {
                            ?>
                            <script>
                                alert('Data Berhasil Diinput');
                                location = "<?php base_url('pro_user/pekerjaan');?>"
                            </script>
                            <?php
                        }else {
                            ?>
                            <script>
                                alert('Data Gagal Diinput');
                                location = "<?php base_url('pro_user/pekerjaan');?>"
                            </script>
                            <?php
                        }
                    } else {
                        $data['title'] = 'Pekerjaan';
                        $data['content'] = 'user/pekerjaan';
                        $this->load->view('user/index', $data);
                        
                    }
                    
                }
            }
        }
// ====================================================================================================
        public function kelahiran(){
            $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");
            $data['title'] = 'Kelahiran';
            $data['content'] = 'user/kelahiran';
            $this->load->view('user/index', $data);
        }
// ====================================================================================================
        public function kematian(){
            $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");
            $data['title'] = 'Kematian';
            $data['content'] = 'user/kematian';
            $this->load->view('user/index', $data);
        }
// ====================================================================================================
        public function perpindahan(){
            $this->cek_user_data("index|pendidikan|pekerjaan|kelahiran|kematian|perpindahan");
            $data['title'] = 'Perpindahan';
            $data['content'] = 'user/perpindahan';
            $this->load->view('user/index', $data);
        }
// ====================================================================================================
        public function kartu_keluarga(){
            $id_user = $this->session->userdata('user_id');
            
            $this->form_validation->set_rules([
                [
                    'field' => 'nomor_kk',
                    'label' => 'Nomor Kartu Keluarga',
                    'rules' => 'trim|required|numeric'
                ],
                [
                    'field' => 'jalan',
                    'label' => 'Jalan',
                    'rules' => 'trim|required|regex_match[/^[a-zA-Z0-9]/]'
                ],
                [
                    'field' => 'blok',
                    'label' => 'Blok',
                    'rules' => 'required'
                ],
                [
                    'field' => 'no_rumah',
                    'label' => 'Nomor Rumah',
                    'rules' => 'trim|required|numeric'
                ],
                [
                    'field' => 'rt',
                    'label' => 'RT',
                    'rules' => 'trim|required|numeric'
                ],
                [
                    'field' => 'rw',
                    'label' => 'RW',
                    'rules' => 'trim|required|numeric'
                ]
            ]);
            
            $query_data = $this->m_warga->select_data('kartu_keluarga', 'id_user', $id_user);
            $cek = $query_data->row();
            $count = $query_data->num_rows();
            if ($count != 0 && $cek->valid == 0) {
                ?>
                <script>
                    alert('Kartu Keluarga Belum di Validasi.');
                    location = "<?= base_url('pro_user'); ?>";
                </script>
                <?php
            } else {
                if ($this->input->post('submit')) {
                    $nomorKK    = $this->input->post('nomor_kk');
                    $jalan      = $this->input->post('jalan');
                    $blok       = $this->input->post('blok');
                    $nomor_rumah= $this->input->post('no_rumah');
                    $rt         = $this->input->post('rt');
                    $rw         = $this->input->post('rw');                
                    
                    if ($this->form_validation->run() == TRUE) {
                        if(isset($cek)) {
                            $data = array(
                                'jalan' => $jalan,
                                'blok' => $blok,
                                'no_rumah' => $nomor_rumah,
                                'rt' => $rt,
                                'rw' => $rw
                            );
                            
                            $isidata = $this->m_warga->edit_data('kartu_keluarga', 'id_user', $id_user, $data);

                            if ($isidata) {
                                ?>
                                <script>
                                    alert('Data berhasil diubah..');
                                    location = "<?= base_url('pro_user/kartu_keluarga'); ?>";
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert('Data gagal diubah..!');
                                    location = "<?= base_url('pro_user/kartu_keluarga'); ?>";
                                </script>
                                <?php
                            }
                        } else {
                            $data = array(
                                'no_kk' => $nomorKK,
                                'jalan' => $jalan,
                                'blok' => $blok,
                                'no_rumah' => $nomor_rumah,
                                'rt' => $rt,
                                'rw' => $rw,
                                'id_user' => $id_user
                            );

                            $isidata = $this->m_warga->input_data('kartu_keluarga', $data);

                            if ($isidata) {
                                ?>
                                <script>
                                    alert('Data berhasil ditambah..');
                                    location = "<?= base_url('pro_user/kartu_keluarga'); ?>";
                                </script>
                                <?php
                            } else {
                                ?>
                                <script>
                                    alert('Data gagal ditambah..!');
                                    location = "<?= base_url('pro_user/kartu_keluarga'); ?>";
                                </script>
                                <?php
                            }
                        }
                    } else {
                        $data['title'] = 'Input Kartu Keluarga';
                        $data['content'] = 'user/kartu_keluarga';
                        $this->load->view('user/index', $data);
                    }
                } else {
                    if ($count != 0) {
                        if ($cek->valid == 1) {
                            $data['listData'] = $cek;
                        }
                    }
                    $data['title'] = 'Input Kartu Keluarga';
                    $data['content'] = 'user/kartu_keluarga';
                    $this->load->view('user/index', $data);
                }
            }
        }
// ====================================================================================================
        public function view_chart_gender(){
            $dataPoints_cowok = array();
            $dataPoints_cewek = array();

            $result_cowok = $this->m_warga->presentasi_data_cowok()->result();
            foreach($result_cowok as $row) {
                array_push($dataPoints_cowok, array('label' => $row->blok, 'y' => $row->jml_laki));
            }
            $data['dataPoints_cowok'] = $dataPoints_cowok;

            $result_cewek = $this->m_warga->presentasi_data_cewek()->result();
            foreach($result_cewek as $row) {
                array_push($dataPoints_cewek, array('label' => $row->blok, 'y' => $row->jml_perempuan));
            }
            $data['dataPoints_cewek'] = $dataPoints_cewek;

            $data['title'] = 'Demografi Penduduk';
            $data['content'] = 'user/diagram_gender';
            $this->load->view('user/index', $data);
        }

// ====================================================================================================
        private function cek_user_data($methods){
            $id_user = $this->session->userdata('user_id');

            $methods = explode("|", $methods);
            $method_used = $this->router->fetch_method();

            $data_ada = $this->m_warga->select_data('kartu_keluarga', 'id_user', $id_user)->num_rows();
            if ($data_ada == 0 && in_array($method_used, $methods)) {
                redirect('pro_user/kartu_keluarga','refresh'); // halaman kk 
            }
        }
    }
    
    /* End of file Pro_user.php */
    
?>