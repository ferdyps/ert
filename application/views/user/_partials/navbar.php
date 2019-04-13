<nav class="navbar navbar-expand-lg navbar-dark bg-success text-white">
  <a class="navbar-brand">ERT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown <?php if($title == "Input Kartu Keluarga" || $title == "Data Keluarga" || $title == "Data Pendidikan" || $title == "Pekerjaan") { echo "active"; } ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Input Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('pro_user/kartu_keluarga');?>">Kartu keluarga</a>
          <a class="dropdown-item" href="<?= base_url('pro_user');?>">Anggota Keluarga</a>
          <a class="dropdown-item" href="<?= base_url('pro_user/pendidikan');?>">Pendidikan</a>
          <a class="dropdown-item" href="<?= base_url('pro_user/pekerjaan');?>">Pekerjaan</a>
        </div>
      </li>
      <li class="nav-item dropdown <?php if($title == "Kelahiran" || $title == "Kematian" || $title == "Perpindahan") { echo "active"; } ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Form Kependudukan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('pro_user/kelahiran');?>">Kelahiran</a>
          <a class="dropdown-item" href="<?= base_url('pro_user/kematian');?>">Kematian</a>
          <a class="dropdown-item" href="<?= base_url('pro_user/perpindahan');?>">Perpindahan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Lihat Data
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Demografi Usia</a>
          <a class="dropdown-item" href="#">Demografi Profesi</a>
          <a class="dropdown-item" href="#">Peta Perumahan</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="#" class="nav-link text-white"><?= $this->session->userdata('username') ?></a> 
      </li>
      <li class="nav-item">
        <a href="<?= site_url('pro_login/logout'); ?>" class="nav-link text-white">Log Out</a> 
      </li>
    </ul>
  </div>
</nav>
