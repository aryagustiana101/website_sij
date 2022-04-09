<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Berita</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Berita</li>
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
                        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('administrator/berita/tambah_berita'); ?>"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Berita</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <h6 class="font-weight-bold">Export Data Berita:</h6>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar Thumbnail</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Waktu Diterbitkan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($beritaAll as $berita) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?php if (is_null($berita['gambar'])) : ?>
                                                <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="img-thumbnail" id="img" width="150">
                                            <?php else : ?>
                                                <img src="<?= base_url(); ?>./uploads/berita/<?= $berita['gambar']; ?>" class="img-thumbnail" id="img" width="150">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $berita['judul']; ?></td>
                                        <td><?= $berita['penulis']; ?></td>
                                        <td><?= date("d F Y H:i:s", strtotime($berita['created_at'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('administrator/berita/detail_berita/') . $berita['id']; ?>" class=" btn btn-sm btn-success mb-2"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="<?= base_url('administrator/berita/edit_berita/') . $berita['id']; ?>" class="btn btn-sm btn-primary mb-2"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modalHapusBerita<?= $berita['id']; ?>"><i class=" fas fa-fw fa-trash-alt"></i></a>
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

<!--Modal Hapus Berita-->
<?php foreach ($beritaAll as $berita) : ?>
    <div class="modal fade" id="modalHapusBerita<?= $berita['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusBerita" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusBerita">Form Hapus Berita</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/berita/hapus_berita') ?>
                <input type="hidden" name="id" value="<?= $berita['id']; ?>">
                <input type="hidden" name="gambar" value="<?= $berita['gambar']; ?>">
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Berita <b><?= $berita['judul']; ?></b>, yang diterbitkan <b><?= date("d F Y H:i:s", strtotime($berita['created_at'])); ?></b> ?
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