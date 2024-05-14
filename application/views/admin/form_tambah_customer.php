<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Customer</h1>
            </div>
        </section>
        <form method="POST" action="<?= base_url('admin/data_customer/tambah_customer_aksi')?>">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
            <?= form_error('nama','<span class="text-small text-danger">','</span>') ?>
        </div>
    
        <div class="form-group">
            <label>username</label>
            <input type="text" name="username" class="form-control">
            <?= form_error('username','<span class="text-small text-danger">','</span>') ?>
        </div>
    
        <div class="form-group">
            <label>alamat</label>
            <input type="text" name="alamat" class="form-control">
            <?= form_error('alamat','<span class="text-small text-danger">','</span>') ?>
        </div>
    
        <div class="form-group">
            <label>gender</label>
            <select class="form-control" name="gender" >
                <option value="">--Pilih Gender--</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <?= form_error('gender','<span class="text-small text-danger">','</span>') ?>
        </div>
    
        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="no_telepon" class="form-control">
            <?= form_error('no_telepon','<span class="text-small text-danger">','</span>') ?>
        </div>
    
        <div class="form-group">
            <label>No. KTP</label>
            <input type="text" name="no_ktp" class="form-control">
            <?= form_error('no_ktp','<span class="text-small text-danger">','</span>') ?>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?= form_error('password','<span class="text-small text-danger">','</span>') ?>
        </div>
        <button value="submit" class="btn btn-sm btn-primary">submit</button>
        <button value="reset" class="btn btn-sm btn-danger">Reset</button>
    
    
    </form>
</div>