<div class="container mt-5">
    <div class="row bg-white rounded shadow">
        <div class="col px-0">
            <h1 class="bg-success rounded-top text-white p-2 text-center">Data Keluarga</h1>
            <?= form_open_multipart(); ?>
            <div class="row px-3">
                <div class="col">
                    <div class="form-group">
                        <label for="NomorKTP">NIK</label>
                        <input type="text" name="nik" id="NomorKTP" class="form-control <?php if(form_error('nik')) { echo 'is-invalid'; } ?>" placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik'); ?>">
                        <div class="invalid-feedback">
                            <?= form_error('nik'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NamaLengkap">Nama Lengkap</label>
                        <input type="text" name="nama" id="NamaLengkap" class="form-control <?php if(form_error('nama')) {echo 'is-invalid'; }?>" placeholder="Nama Lengkap" value="<?= set_value('nama');?>">
                        <div class="invalid-feedback">
                            <?= form_error('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NomorTelepon">Nomor Telepon/HP</label>
                        <input type="text" name="telp" id="NomorTelepon" class="form-control <?php if(form_error('telp')) {echo 'is-invalid'; }?>" placeholder="Nomor Telepon/HP" value="<?= set_value('telp');?>">
                        <div class="invalid-feedback">
                            <?= form_error('telp');?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="Tempat">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat" class="form-control <?php if(form_error('tempat_lahir')) {echo 'is-invalid'; } ?>" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir');?>">
                            <div class="invalid-feedback">
                                <?= form_error('tempat_lahir');?>
                            </div>
                        </div>
                        <div class="col">
                            <label for="Tanggal">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="Tanggal" class="form-control <?php if(form_error('tanggal_lahir')) {echo 'is-invalid'; } ?>" value="<?= set_value('tempat_lahir');?>">
                            <div class="invalid-feedback">
                                <?= form_error('tanggal_lahir');?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Jumlahkendaraan">Jumlah Kendaraan</label>
                        <input type="number" name="kendaraan" id="JumlahKendaraan" class="form-control <?php if(form_error('kendaraan')) {echo 'is-invalid'; }?>" placeholder="Jumlah Kendaraan" value="<?= set_value('kendaraan');?>">
                        <div class="invalid-feedback">
                            <?= form_error('kendaraan');?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Gambar">Foto</label>
                        <input type="file" name="foto" id="Gambar" class="form-control-file">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Agama">Agama</label>
                        <select name="agama" id="Agama" class="form-control">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="JK">Jenis Kelamin</label>
                        <select name="jk" id="JK" class="form-control">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Status">Status Pernikahan</label>
                        <select name="status" id="JK" class="form-control">
                            <option value="menikah">Menikah</option>
                            <option value="lajang">Lajang</option>
                        </select>
                    </div>
                    <?php if($data_suami_ada){ ?>
                        <div class="form-group">
                            <label for="HDK">Hubungan Dalam Keluarga</label>
                            <select name="hubungan" id="HDK" class="form-control">
                                <option value="Istri">Istri</option>
                                <option value="anak">Anak</option>
                            </select>
                        </div>
                    <?php } else { ?>
                    <input type="hidden" name="hubungan" value="Suami">
                    <?php } ?>
                    <div class="form-group">
                        <label for="NomorPaspor">Nomor Paspor</label>
                        <input type="text" name="paspor" id="NomorPaspor" class="form-control <?php if(form_error('paspor')) { echo 'is-invalid'; } ?>" placeholder="Nomor Paspor" value="<?= set_value('paspor');?>">
                        <div class="invalid-feedback">
                            <?= form_error('paspor');?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group text-center w-100">
                    <input type="submit" name="submit" class="btn btn-success" value="Tambah"> <input type="reset" class="btn btn-danger" value="Reset">
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>