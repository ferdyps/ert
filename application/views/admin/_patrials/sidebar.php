  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($title == "Dashboard") { echo "active"; } ?>">
          <a href="<?= base_url('pro_admin');?>">
            <i class="fa fa-dashboard"></i><span> Dashboard</span>
          </a>
        </li>
        <li class="<?php if($title == "Diagram Penduduk") { echo "active"; } ?>">
          <a href="<?= base_url('pro_admin/diagram');?>">
            <i class="fa fa-pie-chart"></i><span> Diagram Kependudukan</span>          
          </a>
        </li>
        <li class=" <?php if($title == "Konfirmasi Tabel Penduduk") { echo "active"; } ?>">
          <a href="<?= base_url('pro_admin/tabel');?>">
            <i class="fa fa-table"></i><span>Konfirmasi Tabel Penduduk</span>
          </a>
        </li>
        <li class=" <?php if($title == "Tabel Penduduk") { echo "active"; } ?>">
          <a href="<?= base_url('pro_admin/tabel_warga');?>">
            <i class="fa fa-table"></i><span>Tabel Penduduk</span>
          </a>
        </li>
        <li class=" <?php if($title == "Konfirmasi Kartu Keluarga") { echo "active"; } ?>">
          <a href="<?= base_url('pro_admin/tabel_kk_novalid');?>">
            <i class="fa fa-table"></i><span>Konfirmasi Kartu Keluarga</span>
          </a>
        </li>
        <li class=" <?php if($title == "Tabel Kartu Keluarga") { echo "active"; } ?>">
          <a href="<?= base_url('pro_admin/tabel_kk_valid');?>">
            <i class="fa fa-table"></i><span>Konfirmasi Kartu Keluarga</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>