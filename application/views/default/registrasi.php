<?php $this->load->view('default/_partials/header'); ?>
<div class="container h-100">
    <div class="d-flex h-75 pt-4">
        <div class="shadow rounded bg-white col-md-8 col-lg-6 p-0 m-auto">
            <h1 class="p-3 bg-success text-center text-white rounded-top">Registrasi</h1>
            <?= form_open('pro_login/insert_registrasi');?>
            <div class="px-3 pt-2">
                <div class="form-group">
                    <input type="text" name="username" class="form-control custom-form <?php if(form_error('username')) {echo 'is-invalid';}?>" placeholder="Username" value="<?= set_value('username'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control custom-form <?php if(form_error('email')) {echo 'is-invalid';}?>" placeholder="Email" value="<?= set_value('email'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control custom-form <?php if(form_error('password')) {echo 'is-invalid';}?>" placeholder="Password" value="<?= set_value('password'); ?>">
                    <div class="invalid-feedback">
                        <?= form_error('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="confirmpass" class="form-control custom-form <?php if(form_error('confirmpass')) {echo 'is-invalid';}?>" placeholder="Konfirmasi Password" value="<?= set_value('confirmpass') ?>">
                    <div class="invalid-feedback">
                        <?= form_error('confirmpass'); ?>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Registrasi" class="btn btn-success">
                </div>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>