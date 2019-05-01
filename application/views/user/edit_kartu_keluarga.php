<div class="container mt-5">
    <div class="row bg-white rounded shadow">
        <div class="col px-0">
            <h1 class="bg-success rounded-top text-white p-2 text-center">Form Kartu Keluarga</h1>
            <?= form_open();?>
            <div class="row px-3">
                <div class="col">
                    <div class="form-group">
                        <label for="nokk">Nomor KK</label>
                        <input type="text" name="nomor_kk" id="nokk" class="form-control" placeholder="Nomor Kartu keluarga" value="<?= set_value('nomor_kk')?>">
                        <?= form_error('nomor_kk')?>
                    </div>
                    <div class="form-group">
                        <label for="Jalan">Jalan</label>
                        <input type="text" name="jalan" id="Jalan" class="form-control" placeholder="Nama Jalan" value="<?= set_value('jalan')?>">
                        <?= form_error('nomor_kk')?>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="Blok">Blok</label>
                            <select name="blok" id="Blok" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="NoRumah">Nomor Rumah</label>
                            <input type="text" name="no_rumah" id="NoRumah" placeholder="Nomor Rumah" class="form-control" value="<?= set_value('no_rumah')?>">
                            <?= form_error('no_rumah')?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="RT">RT</label>
                            <input type="text" class="form-control" name="rt" id="RT" placeholder="Rukun Tetangga" value="<?= set_value('rt')?>">
                            <?= form_error('rt')?>
                        </div>
                        <div class="col">
                            <label for="RW">RW</label>
                            <input type="text" name="rw" id="RW" placeholder="Rukun Warga" class="form-control" value=<?= set_value('rw')?>>
                            <?= form_error('rt')?>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Tambah" class="btn btn-success mt-3">
                    </div>
                </div>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>