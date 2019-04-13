<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-hover table-striped text-center">
                  <thead>
                    <tr>
                      <th>Nomor KK</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Agama</th>
                      <th>Nomor Telepon/HP</th>
                      <th>Hubungan dalam keluarga</th>
                      <th>Status</th>
                      <th>Jumlah Kendaraan</th>
                      <th>Nomor Paspor</th>
                      <th style="width:10%">Foto</th>
                    </tr>
                  </thead>
                  <?php
                    foreach($list_datavalid as $row){
                  ?>
                      <tbody>
                        <tr>
                          <td><?= $row['no_kk'] ?></td>
                          <td><?= $row['nik'] ?></td>
                          <td><?= $row['nama'] ?></td>
                          <td><?= $row['tempat_lahir'] ?></td>
                          <td><?= $row['tgl_lahir'] ?></td>
                          <td><?= $row['jk'] ?></td>
                          <td><?= $row['agama'] ?></td>
                          <td><?= $row['telp'] ?></td>
                          <td><?= $row['hub_dlm_kel'] ?></td>
                          <td><?= $row['status'] ?></td>
                          <td><?= $row['jml_kendaraan'] ?></td>
                          <td><?= $row['no_paspor'] ?></td>
                          <td><img style="width:100%" src="<?= base_url("uploads/") . $row['foto']; ?>"></td>
                          </tr>
                      </tbody>
                  <?php  
                    }
                  ?>
                </table>
                </div>
            </div>
            </section>
          </div>
