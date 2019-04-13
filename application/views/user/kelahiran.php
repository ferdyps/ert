<div class="container mt-5">
    <div class="row bg-white rounded shadow">
        <div class="col px-0">
            <h1 class="bg-success rounded-top text-white p-2 text-center">Form Kelahiran</h1>
            <div class="col">
            <?= form_open();?>
            <div class="row px-3">
                <div class="col">
                    <div class="form-group">
                        <label for="nomorlahir">Nomor Kelahiran</label>
                        <input type="text" name="" id="nomorlahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="" id="" class="form-control">
                            <option value="">Laki-laki</option>
                            <option value="">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir">Tempat Lahir</label>
                        <input type="text" name="" id="tempatlahir" class="form-control">
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Kelahiran</label>
                            <select name="" id="" class="form-control">
                                <option value="">Tunggal</option>
                                <option value="">Kembar</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Jika Kelahiran kembar,anak lahir ke </label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Rumah Sakit</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Tambah" class="btn btn-success text-center">
                    </div>
                </div>
            </div>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>