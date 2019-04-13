<!-- 'controlsidebar' => $this->load->view('Admin/_patrials/controlsidebar', NULL,TRUE),

      'footer' => $this->load->view('Admin/_patrials/footer', NULL,TRUE),

      'head' => $this->load->view('Admin/_patrials/head', NULL,TRUE),

      'header' => $this->load->view('Admin/_patrials/header', NULL,TRUE),

      'sidebar' => $this->load->view('Admin/_patrials/sidebar', NULL,TRUE)
 -->
<!-- Head -->
<?php $this->load->view('admin/_patrials/header');?>
<div class="wrapper">

  <!-- header -->
   <?php $this->load->view('admin/_patrials/navbar');?>

  <!-- Left side column. contains the logo and sidebar -->

 <!-- sidebar -->
 <?php $this->load->view('admin/_patrials/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->
  
  <?php  $this->load->view($content)?>
  <!-- Control Sidebar -->
  <?php  $this->load->view('admin/_patrials/footbar');?>
 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- Footer -->
<?php  $this->load->view('admin/_patrials/footer'); ?>