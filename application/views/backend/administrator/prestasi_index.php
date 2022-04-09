<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Prestasi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Prestasi</li>
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
                        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('administrator/prestasi/tambah_prestasi'); ?>"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Prestasi</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <h6 class="font-weight-bold">Export Data Prestasi:</h6>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto Prestasi</th>
                                    <th>Judul</th>
                                    <th>Waktu Diterbitkan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($prestasiAll as $prestasi) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?php if (is_null($prestasi['foto'])) : ?>
                                                <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="img-thumbnail" id="img" width="150">
                                            <?php else : ?>
                                                <img src="<?= base_url(); ?>./uploads/prestasi/<?= $prestasi['foto']; ?>" class="img-thumbnail" id="img" width="150">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $prestasi['judul']; ?></td>
                                        <td><?= date("d F Y H:i:s", strtotime($prestasi['created_at'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('administrator/prestasi/detail_prestasi/') . $prestasi['id']; ?>" class=" btn btn-sm btn-success mb-2"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="<?= base_url('administrator/prestasi/edit_prestasi/') . $prestasi['id']; ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modalHapusPrestasi<?= $prestasi['id']; ?>"><i class=" fas fa-fw fa-trash-alt"></i></a>
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

<!--Modal Hapus Prestasi-->
<?php foreach ($prestasiAll as $prestasi) : ?>
    <div class="modal fade" id="modalHapusPrestasi<?= $prestasi['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusPrestasi" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusPrestasi">Form Hapus Prestasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/prestasi/hapus_prestasi') ?>
                <input type="hidden" name="id" value="<?= $prestasi['id']; ?>">
                <input type="hidden" name="gambar" value="<?= $prestasi['foto']; ?>">
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Prestasi <b><?= $prestasi['judul']; ?></b>, yang diterbitkan <b><?= date("d F Y H:i:s", strtotime($prestasi['created_at'])); ?></b> ?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-fw fa-trash-alt mr-1"></i> Hapus</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>