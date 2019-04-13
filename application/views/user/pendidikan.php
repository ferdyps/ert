<div class="container mt-5">
    <div class="row bg-white rounded shadow">
        <div class="col px-0">
            <h1 class="bg-success rounded-top text-white p-2 text-center">Riwayat Pendidikan</h1>
            <?= form_open('c_warga/input_pendidikan');?>
            <div class="row px-3">
                <div class="col">
                    <div class="form-group">
                        <label for="NamaSekolah">Nama Lengkap</label>
                        <input type="text" name="nama_sekolah" id="NamaSekolah" class="form-control" placeholder="Nama Sekolah/Universitas">
                        <select name="riwayat_pend" id="Pendidikan" class="form-control">
                            <?php foreach($data_keluargaku as $data): ?>
                            <option value="<?= $data->nama ?>"><?= $data->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="Pendidikan">Pendidikan terakhir</label>
                        <select name="riwayat_pend" id="Pendidikan" class="form-control">
                            <option value="SD">SD</option>
                            <option value="SMP/SLTP">SMP/SLTP</option>
                            <option value="SMA/SLTA/SMK">SMA/SLTA/SMK</option>
                            <option value="Diploma 3">Diploma 3</option>
                            <option value="Strata 1/Diploma 4">Strata 1/Diploma 4</option>
                            <option value="Strata 2">Strata 2</option>
                            <option value="Strata 3">Strata 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NamaSekolah">Nama Sekolah/Universitas</label>
                        <input type="text" name="nama_sekolah" id="NamaSekolah" class="form-control" placeholder="Nama Sekolah/Universitas">
                    </div>
                    <div class="form_group">
                        <label for="Alamat">Alamat Sekolah/Universitas</label>
                        <input type="text" name="alamat_sekolah" id="Alamat" class="form-control" placeholder="Alamat Sekolah/Universitas">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Tambah" class="btn btn-success mt-3">
                    </div>
                </div>
            </div>
            <?= form_open();?>
        </div>
    </div>
</div>