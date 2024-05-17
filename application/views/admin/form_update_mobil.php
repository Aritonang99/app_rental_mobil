<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Update Data Mobil</h1>
        </div>
        <div class="card">

            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/data_mobil/update_mobil_aksi') ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type Mobil</label>
                                <input type="hidden" name="id_mobil" value="<?php echo $mobil->id_mobil ?>">
                                <select name="kode_type" class="form-control">
                                    <option value="<?php echo $mobil->kode_type ?>"><?php echo $mobil->nama_type ?></option>
                                    <?php foreach ($type as $tp): ?>
                                    <option value="<?php echo $tp->kode_type ?>"><?php echo $tp->nama_type ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('kode_type', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Merek</label>
                                <input type="text" name="merek" class="form-control" value="<?php echo $mobil->merek ?>">
                                <?php echo form_error('merek', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>No. Plat</label>
                                <input type="text" name="no_plat" class="form-control" value="<?php echo $mobil->no_plat ?>">
                                <?php echo form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" name="warna" class="form-control" value="<?php echo $mobil->warna ?>">
                                <?php echo form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" name="tahun" class="form-control" value="<?php echo $mobil->tahun ?>">
                                <?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?php if($mobil->status == "1"){ echo "selected"; } ?>>Tersedia</option>
                                    <option value="0" <?php if($mobil->status == "0"){ echo "selected"; } ?>>Tidak Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" id="files" class="form-control">
                                <input type="hidden" name="gambar_lama" value="<?php echo $mobil->gambar; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
