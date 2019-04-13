<div class="container mt-5">
    <div class="row rounded bg-white shadow">
        <div class="col px-0">
            <h1 class="bg-success text-white rounded-top text-center p-2">Perpindahan</h1>
            <?= form_open();?>
            <div class="row px-3">
                <div class="col">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alasan Kepindahan</label>
                        <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
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