<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pro_login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('m_user');
        }

        public function index(){
            $this->cek_session();
            $this->load->view('default/login');
        }

        public function login(){
            $autentikasi = $this->input->post('autentikasi');
            $password = $this->input->post('password');
            $auth_data = array(
                'autentikasi' => $autentikasi,
                'password' => md5($password)
            );
            $user_auth = $this->m_user->cek_user($auth_data)->row();
            if (!empty($user_auth)) {
                //data session
                $array = array(
                    'user_id' => $user_auth->id_user,
                    'username' => $user_auth->username,
                    'akses' => $user_auth->akses,
                    'status' => 'berhasil'
                );
                //set session
                $this->session->set_userdata($array);

                //cek akses
                if ($user_auth->akses == 'kepala') {
                    redirect('pro_user/','refresh');
                } elseif ($user_auth->akses == 'anggota'){
                    // redirect('pro_user/','refresh');
                    echo "anggota";
                } elseif ($user_auth->akses == 'admin') {
                    redirect('pro_admin/','refresh');
                }
            } else {
                $this->session->set_flashdata('login_gagal', 'Username atau Password Salah');
                $this->load->view('default/login');
            }
            
        }

        public function dashboard(){
            if(!$this->session->has_userdata('status')){
                redirect('pro_login/','refresh');
            }
            $this->load->view('admin/dashboard');
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('pro_login/','refresh');
        }

        public function registrasi(){
            $this->load->view('default/registrasi');
        }

        public function insert_registrasi(){
            $username       = $this->input->post('username');
            $email          = $this->input->post('email');
            $password       = $this->input->post('password');
            $confirmpass    = $this->input->post('confirmpass');
            
            $this->form_validation->set_rules([
                [
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'trim|required|is_unique[user.username]|min_length[5]|max_length[12]'
                ],
                [
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'trim|required|valid_email'
                ],
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[8]'
                ],
                [
                    'field' => 'confirmpass',
                    'label' => 'Konfirmasi Password',
                    'rules' => 'trim|required|min_length[8]|matches[password]'
                ]
            ]);
            if ($this->form_validation->run() === false) {
                $this->load->view('default/registrasi');
            } else {
                $masuk = $this->m_user->insert_user(
                    array(
                        'username' => $username,
                        'email' => $email,
                        'password' => md5($password),
                        'akses' => 'kepala'
                    )
                );
                if ($masuk) {
                    ?>
                    <script>
                        alert('Registrasi Berhasil');
                        location = "<?= base_url('pro_login/'); ?>";
                    </script>
                    <?php
                } else {
                    $this->load->view('default/registrasi');
                    
                }
            }
        }

        private function cek_session(){
            if($this->session->userdata('status') != NULL){
                if ($this->session->userdata('akses') == "admin") {
                    redirect('pro_admin/','refresh');
                } elseif($this->session->userdata('akses') == "kepala") {
                    redirect('pro_user/','refresh');
                }
            }
        }
    }
?>