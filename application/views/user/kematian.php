<div class="container mt-5">
    <div class="row bg-white rounded shadow">
        <div class="col px-0">
            <h1 class="bg-success rounded-top text-white p-2 text-center">Form Kematian</h1>
            <div class="col">
                <?= form_open();?>
                <div class="row px-3">
                    <div class="col">
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
                            <label for="">Tanggal Meninggal</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Penyebab</label>
                            <select name="" id="" class="form-control">
                                <option value="">Sakit</option>
                                <option value="">Kecelakaan</option>
                            </select>
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
</div>