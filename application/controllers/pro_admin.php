<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

class Pro_admin extends CI_Controller{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		
		if(!$this->session->has_userdata('status')){
			redirect('pro_login/','refresh');
        } else {
			if ($this->session->userdata('akses') == 'kepala') {
				redirect('pro_user/','refresh');
			}
		}
	}
	

	public function index(){
		$data['content'] = 'admin/dashboard';
		$data['title'] = "Dashboard";
		$this->load->view('admin/index', $data);
	}
	public function diagram(){
		$data['content'] = 'admin/diagram';
		$data['title'] = "Diagram Penduduk";
		$this->load->view('admin/index', $data);
	}
	public function tabel_kk_novalid(){
		$data['list_kk'] = $this->m_admin->lihat_kk_novalid()->result_array();
		$data['content'] = 'admin/tabel_kk';
		$data['title'] = "Konfirmasi Kartu Keluarga";
		$this->load->view('admin/index', $data);
	}
	public function tabel(){
		$data['list_data'] = $this->m_admin->lihat_data_warga_novalid()->result_array();
		$data['content'] = 'admin/tabel';
		$data['title'] = "Konfirmasi Tabel Penduduk";
		$this->load->view('admin/index', $data);
	}
	public function tabel_warga(){
		$data['list_datavalid'] = $this->m_admin->lihat_data()->result_array();
		$data['content'] = 'admin/tabel_warga';
		$data['title'] = "Tabel Penduduk";
		$this->load->view('admin/index', $data);
	}
	public function tabel_kk_valid(){
		$data['list_kkvalid'] = $this->m_admin->lihat_kk_valid()->result_array();
		$data['content'] = 'admin/tabel_kkvalid';
		$data['title'] = "Tabel Kartu keluarga";
		$this->load->view('admin/index', $data);
	}
	public function validasi_warga($id) {
		$data['valid'] = 1;

		$query = $this->m_admin->edit_data('warga', 'nik', $id, $data);

		if ($query) {
			?>
			<script>
				alert('Validasi Warga berhasil..');
				location = "<?= base_url('pro_admin/tabel') ?>";
			</script>
			<?php
		} else {
			?>
			<script>
				alert('Validasi Warga gagal..!');
				location = "<?= base_url('pro_admin/tabel') ?>";
			</script>
			<?php
		}
	}
	public function validasi_kk($id){
		$data['valid'] = 1;
		$query = $this->m_admin->edit_data('kartu_keluarga','no_kk',$id,$data);
		if ($query) {
			?>
			<script>
				alert('Validasi Kartu Keluarga Berhasil');
				location = "<?= base_url('pro_admin/tabel_kk_novalid')?>";
			</script>
			<?php
		}else{
			?>
			<script>
				alert('Validasi Kartu Keluarga Gagal');
				location = "<?= base_url('pro_admin/tabel_kk_novalid')?>";
			</script>
			<?php
		}
	}
	// private function templates(){
	// 	return [
	// 		'controlsidebar' => $this->load->view('admin/_patrials/controlsidebar', NULL,TRUE),

	// 		'footer' => $this->load->view('admin/_patrials/footer', NULL,TRUE),

	// 		'head' => $this->load->view('admin/_patrials/head', NULL,TRUE),

	// 		'header' => $this->load->view('admin/_patrials/header', NULL,TRUE),

	// 		'sidebar' => $this->load->view('admin/_patrials/sidebar', NULL,TRUE)


	// 	];
	// }

}
?>