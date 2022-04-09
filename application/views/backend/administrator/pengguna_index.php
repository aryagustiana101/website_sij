<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel <?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="row pl-2">
                        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('administrator/pengguna/tambah_pengguna'); ?>"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Data Pengguna</a>
                    </div>
                    <h6 class="font-weight-bold">Export Data Pengguna:</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($penggunaAll as $pengguna) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $pengguna['nama']; ?></td>
                                        <td><?= $pengguna['email']; ?></td>
                                        <td><?= $pengguna['jenis_kelamin']; ?></td>
                                        <td><?= $pengguna['role']; ?></td>
                                        <?php if ($pengguna['active'] == 1) : ?>
                                            <td>Aktif</td>
                                        <?php elseif ($pengguna['active'] == 0) : ?>
                                            <td>Tidak Aktif</td>
                                        <?php endif; ?>
                                        <td class="text-right">
                                            <a href="<?= base_url('administrator/pengguna/detail_pengguna/') . $pengguna['id']; ?>" class="btn btn-sm btn-success mb-2"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="<?= base_url('administrator/pengguna/edit_pengguna/') . $pengguna['id']; ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#hapusPengguna<?= $pengguna['id']; ?>"><i class="fas fa-fw fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Pengguna -->
<?php foreach ($penggunaAll as $pengguna) : ?>
    <div id="hapusPengguna<?= $pengguna['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hapusPengguna" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusPengguna">Form Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('administrator/pengguna/hapus_pengguna'); ?>
                <input type="hidden" name="id" value="<?= $pengguna['id']; ?>" />
                <input type="hidden" name="foto" value="<?= $pengguna['foto']; ?>" />
                <div class="modal-body">
                    <p>
                        Apakah Anda Yakin Untuk Menghapus Pengguna <b><?= $pengguna['nama']; ?> </b> Beserta Datanya?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-trash-alt mr-2"></i>Hapus</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>