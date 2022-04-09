<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Galeri Foto</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Galeri Foto</li>
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
                        <a class="btn btn-success btn-sm mb-3" href="#" data-toggle="modal" data-target="#modalTambahGaleriFoto"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Foto</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <h6 class="font-weight-bold">Export Data Galeri Foto:</h6>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Judul</th>
                                    <th>Waktu Diterbitkan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($galeriFotoAll as $galeriFoto) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>
                                            <img src="<?= base_url(); ?>./uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" class="img-thumbnail" id="img" width="150">
                                        </td>
                                        <td><?= $galeriFoto['judul']; ?></td>
                                        <td><?= date("d F Y H:i:s", strtotime($galeriFoto['created_at'])); ?></td>
                                        <td>
                                            <a href="#" class=" btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#modalDetailGaleriFoto<?= $galeriFoto['id']; ?>"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="#" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalEditGaleriFoto<?= $galeriFoto['id']; ?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modalHapusGaleriFoto<?= $galeriFoto['id']; ?>"><i class=" fas fa-fw fa-trash-alt"></i></a>
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

<!--Modal Tambah Galeri Foto-->
<div class="modal fade" id="modalTambahGaleriFoto" tabindex="-1" role="dialog" aria-labelledby="modalTambahGaleriFoto" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahGaleriFoto">Form Tambah Foto Galeri</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('administrator/galeri_foto/tambah_galeri_foto') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul" class="font-weight-bold">Judul Foto:</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>

                <div class="form-group">
                    <label for="gambar" class="font-weight-bold">Gambar Foto Galeri </label>
                    <small class="font-italic d-block">(Wajib Untuk Mengupload Gambar, Rekomendasi 600px)</small>
                    <div class="row px-3 pb-3">
                        <div id="upload_prev">
                            <img id="photoShowId" src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="img-thumbnail" width="200" />
                        </div>
                    </div>
                    <div class="custom-file">
                        <input id="uploadBtn" type="file" class="upload custom-file-input" name="gambar" />
                        <label class="custom-file-label text-muted" for="uploadBtn">Pilih Gambar (PNG, JPG, JPEG)</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-fw fa-plus mr-1"></i> Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!--Modal Detail Galeri Foto-->
<?php foreach ($galeriFotoAll as $galeriFoto) : ?>
    <div class="modal fade" id="modalDetailGaleriFoto<?= $galeriFoto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailGaleriFoto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailGaleriFoto">Detail Foto Galeri</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url(); ?>uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" class="img-thumbnail mx-auto d-block mb-3" />
                    <dl class="row">
                        <dt class="col-sm-4">Judul Foto</dt>
                        <dd class="col-sm-8"><?= $galeriFoto['judul']; ?></dd>
                        <dt class="col-sm-4">Waktu Terbit Foto</dt>
                        <dd class="col-sm-8"><?= date("d F Y H:i:s", strtotime($galeriFoto['created_at'])); ?></dd>
                        <?php if (is_null($galeriFoto['updated_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-4">Terakhir Diperbaharui</dt>
                            <dd class="col-sm-8"><?= date("d F Y H:i:s", strtotime($galeriFoto['updated_at'])); ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" type="button" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--Modal Edit Galeri Foto-->
<?php
$i = 1;
foreach ($galeriFotoAll as $galeriFoto) : ?>
    <div class="modal fade" id="modalEditGaleriFoto<?= $galeriFoto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditGaleriFoto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditGaleriFoto">Form Edit Foto Galeri</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open_multipart('administrator/galeri_foto/edit_galeri_foto') ?>
                <input type="hidden" name="id" value="<?= $galeriFoto['id']; ?>">
                <input type="hidden" name="gambar_lama" value="<?= $galeriFoto['gambar']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul Foto:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $galeriFoto['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gambar" class="font-weight-bold">Gambar Foto Galeri </label>
                        <small class="font-italic d-block">(Wajib Untuk Mengupload Gambar, Rekomendasi 600px)</small>
                        <div class="row px-3 pb-3">
                            <div id="upload_prev">
                                <img id="photoShowId<?= $i; ?>" src="<?= base_url(); ?>uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" class="img-thumbnail" width="200" />
                            </div>
                        </div>
                        <div class="custom-file">
                            <input id="uploadBtn<?= $i; ?>" type="file" class="upload custom-file-input" name="gambar" />
                            <label class="custom-file-label text-muted" for="uploadBtn<?= $i; ?>">Pilih Gambar (PNG, JPG, JPEG)</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-fw fa-pencil-alt mr-1"></i> Edit</button>
                </div>
                <?php $i++; ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--Modal Hapus Galeri Foto-->
<?php foreach ($galeriFotoAll as $galeriFoto) : ?>
    <div class="modal fade" id="modalHapusGaleriFoto<?= $galeriFoto['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusGaleriFoto" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusGaleriFoto">Form Hapus Foto Galeri</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/galeri_foto/hapus_galeri_foto') ?>
                <input type="hidden" name="id" value="<?= $galeriFoto['id']; ?>">
                <input type="hidden" name="gambar" value="<?= $galeriFoto['gambar']; ?>">
                <div class="modal-body">
                    <img src="<?= base_url(); ?>uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" class="img-thumbnail mx-auto d-block mb-3" width="200" />
                    Apakah Anda Yakin Untuk Menghapus Foto <b><?= $galeriFoto['judul']; ?></b>?
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

<?php $index = count($galeriFotoAll); ?>
<input type="hidden" id="index" value="<?= $index; ?>">