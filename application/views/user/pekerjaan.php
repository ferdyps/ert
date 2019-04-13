<div class="container mt-5">
    <div class="row rounded bg-white shadow">
        <div class="col px-0">
            <h1 class="bg-success text-white rounded-top text-center p-2">Pekerjaan</h1>
            <?= form_open();?>
            <div class="row px-3">
                <div class="col">
                    <div class="form-group">
                        <label for="Pekerjaan">Pekerjaan</label>
                        <select class="form-control" name="pekerjaan" id="Pekerjaan">
                            <option value="PNS">Pegawai Negeri Sipil</option>
                            <option value="Pegawai Swasta">Pegawai Swasta</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NamaPerusahaan">Nama Perusahaan/Institusi</label>
                        <input type="text" name="nama_perusahaan" id="NamaPerusahaan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat Perusahaan/Institusi</label>
                        <input type="text" name="alamat_perusahaan" id="Alamat" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Tambah" class="btn btn-success text-center">
                    </div>
                </div>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>