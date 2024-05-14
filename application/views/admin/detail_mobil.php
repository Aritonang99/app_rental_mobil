<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Mobil</h1>
            </div>
        </section>
        <?php foreach ($detail as $dt):?>
            <div class="card">
                <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                    <img class="mw-100" src="<?php echo base_url('assets/upload/'.$dt->gambar)?>">
                    </div>
                    <div class="col-md-7">
                        <table class="table table-bordered">

                            <tr>
                                <td class="bg-primary text-white">Type Mobil</td>
                                <td>
                                <?php
                                if ($dt->kode_type == "SDN") {
                                    echo "Sedan";
                                } else if ($dt->kode_type == "HTB") {
                                    echo "Hatcback";
                                } else if ($dt->kode_type == "MPV") {
                                    echo "Multi Purpose Vechile";
                                }else{
                                    echo "<span class = 'text-danger'>Type Mobil Belum Terdaftar</span>";

                                }
                                
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Merek Mobil</td>
                                <td><?php echo $dt->merek ?></td>
                            </tr>
                                <td class="bg-primary text-white">No. Plat</td>
                                <td><?php echo $dt->no_plat ?></td>
                            <tr>
                            </tr>
                                <td>Warna</td>
                                <td><?php echo $dt->warna ?></td>
                            </tr>
                            <tr>
                                <td class="bg-info text-white">Tahun</td>
                                <td><?php echo $dt->tahun ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <?php 
                                    if ($dt->status == "0") {
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    } else{
                                        echo "<span class='badge badge-primary'>Tersedia</span>";}
                                    ?>
                                </td>
                            </tr>
                        </table>
                        <a class="btn btn-lg btn-danger" href="<?php echo base_url('admin/data_mobil')?>">Kembali</a>
                        <a class="btn btn-lg btn-primary" href="<?php echo base_url('admin/data_mobil/update_mobil/'.$dt->id_mobil)?>">Update</a>

                    </div>
                </div>
                </div>
            </div>

        <?php endforeach?>
</div>