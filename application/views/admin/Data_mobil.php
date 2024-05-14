<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Mobil</h1>
            </div>
            <a href="<?php echo base_url('admin/data_mobil/tambah_mobil')?>" class="btn btn-primary mb-3">Tambah Data </a>
            <table class="table table-hover table-striped table-borderd">
                <?php echo $this->session->flashdata('pesan')?>
                <thead>
                    <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Type</th>
                    <th>Merek</th>
                    <th>No Plat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                    foreach ($mobil as $mb ):
                    ?>
                    <tr>
                    <td><?php echo $no++ ?></td>
                    <td>
                        <img width="50px" src="<?php echo base_url('assets/upload/').$mb->gambar ?>">
                    </td>
                    <td><?php echo $mb->kode_type ?></td>
                    <td><?php echo $mb->merek?></td>
                    <td><?php echo $mb->no_plat?></td>
                    <td><?php   
                    if($mb->status == "0"){
                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }else{
                        echo "<span class='badge badge-primary'>Tersedia</span>";
                    }
                    ?></td>
                    <td>
                        <a href="<?= base_url('admin/data_mobil/detail_mobil/').$mb->id_mobil ?>" class="btn btn-sm btn-success"><i class ="fas fa-eye"></i></a>
                        <a href="<?= base_url('admin/data_mobil/delete_mobil/').$mb->id_mobil ?>" class="btn btn-sm btn-danger"><i class ="fas fa-trash"></i></a>
                        <a href="<?= base_url('admin/data_mobil/update_mobil/').$mb->id_mobil ?>" class="btn btn-sm btn-primary"><i class ="fas fa-edit"></i></a>
                    </td>
                    <?php endforeach;?>
                    </tr>
                </tbody>

            </table>
        </section>
</div>