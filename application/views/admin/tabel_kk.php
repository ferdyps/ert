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
                      <th>Jalan</th>
                      <th>Blok</th>
                      <th>Nomor Rumah</th>
                      <th>RT</th>
                      <th>RW</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <?php
                    foreach($list_kk as $row){
                  ?>
                      <tbody>
                        <tr>
                          <td><?= $row['no_kk'] ?></td>
                          <td><?= $row['jalan'] ?></td>
                          <td><?= $row['blok'] ?></td>
                          <td><?= $row['no_rumah'] ?></td>
                          <td><?= $row['rt'] ?></td>
                          <td><?= $row['rw'] ?></td>
                          <td><a href="<?= base_url('pro_admin/validasi_kk/' . $row['no_kk']) ?>"><button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin ingin mengkonfirmasi..?');"><i class="fa fa-check fa-fw"></i>Konfirmasi</button></a></td>
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
