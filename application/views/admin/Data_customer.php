<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Customer</h1>
            </div>
            <a href="<?php echo base_url('admin/data_customer/tambah_customer')?>" class="btn btn-primary mb-3">Tambah Customer</a>

                <?php echo $this->session->flashdata('pesan')?>
                <table class="table table-striped table-responsive table-bordered mw-100">
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                    <th>No. Telepon</th>
                    <th>No. KTP</th>
                    <th tipe="password" >Password </th>
                    <th>Action</th>
                </tr>
                <?php
                $no=1;
                foreach($customer as $cs ) :?>
                <tr>
                <td><?= $no++ ?></td>
                <td><?= $cs->nama ?></td>
                <td><?= $cs->username ?></td>
                <td><?= $cs->alamat ?></td>
                <td><?= $cs->gender ?></td>
                <td><?= $cs->no_telepon ?></td>
                <td><?= $cs->no_ktp ?></td>
                <td><?= $cs->password ?></td>
                <td>
                    <div class="row">
                    <a href="<?= base_url('admin/data_customer/delete_customer/').$cs->id_customer?>" class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></a>
                    <a href="<?= base_url('admin/data_customer/update_customer/').$cs->id_customer?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </div>
                </td>




                </tr>


                <?php endforeach?>
                </table>
