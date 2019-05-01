<?php $this->load->view('default/_partials/header');
?>
<div class="container h-100">
    <div class="d-flex h-75 pt-4">
        <div class="shadow rounded bg-white col-md-8 col-lg-6 p-0 m-auto">
            <h1 class="p-3 bg-success text-center text-white rounded-top">Login</h1>
            <?= form_open('pro_login/login');?>
            <div class="px-3 pt-2">
                <div class="form-group">
                    <input type="text" name="autentikasi" class="form-control custom-form" placeholder="Username/Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control custom-form" placeholder="Password">
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
                <div class="form-group text-center">
                    <a class="btn btn-warning" href="<?= base_url('pro_login/registrasi');?>">Registrasi Kepala Keluarga</a>
                    <a class="btn btn-warning" href="<?= base_url('pro_login/registrasi_anggota');?>">Registrasi Anggota Keluarga</a>
                </div>
            </div>
            <div class="px-3 pt-2 text-center">
                <?= $this->session->flashdata('login_gagal') ?>
                <?= 
                $this->session->userdata('status');
                 ?>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>