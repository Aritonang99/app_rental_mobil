<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <?php foreach ($detail as $dt):?>
                <div class="row">
                    <div class="col-md-6">
                        <img class="mw-100" src="<?= base_url('assets/upload/'.$dt->gambar)?>" alt="">
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>Merek</th>
                                <td><?= $dt->merek?></td>
                            </tr>
                            <tr>
                                <th>no_plat</th>
                                <td><?= $dt->no_plat?></td>
                            </tr>
                            <tr>
                                <th>warna</th>
                                <td><?= $dt->warna?></td>
                            </tr>
                            <tr>
                                <th>tahun</th>
                                <td><?= $dt->tahun?></td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>                                    <?php 
                                    if ($dt->status == "0") {
                                        echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                                    } else{
                                        echo "<span class='badge badge-success'>Tersedia</span>";}
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                <?php
                                    if($dt->status == '0')
                                    {
                                    echo "<span class='btn btn-danger' disable >Tidak Tersedia </span>";
                                    }else{
                                    echo anchor('customer/rental/tambah_rental'.$dt->id_mobil,'<button class= "btn btn-success"> Rent Now </button>');

                                    }
                                    
                                    ?>
                                </th>
                                <td></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <?php endforeach?>

        </div>
    </div>
</div>