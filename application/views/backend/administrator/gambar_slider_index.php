<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gambar Slider</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Gambar Slider</li>
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
                        <a class="btn btn-success btn-sm mb-3" href="#" data-toggle="modal" data-target="#modalTambahGambarSlider"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Gambar</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <h6 class="font-weight-bold">Export Data Gambar Slider:</h6>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Waktu Diupload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($gambarSliderAll as $gambarSlider) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td>
                                            <img src="<?= base_url(); ?>./uploads/gambar_slider/<?= $gambarSlider['gambar']; ?>" class="img-thumbnail" id="img" width="150">
                                        </td>
                                        <td><?= $gambarSlider['judul']; ?></td>
                                        <td><?= date("d F Y H:i:s", strtotime($gambarSlider['created_at'])); ?></td>
                                        <td>
                                            <a href="#" class=" btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#modalDetailGambarSlider<?= $gambarSlider['id']; ?>"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="#" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalEditGambarSlider<?= $gambarSlider['id']; ?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modalHapusGambarSlider<?= $gambarSlider['id']; ?>"><i class=" fas fa-fw fa-trash-alt"></i></a>
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

<!--Modal Tambah Gambar Slider-->
<div class="modal fade" id="modalTambahGambarSlider" tabindex="-1" role="dialog" aria-labelledby="modalTambahGambarSlider" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahGambarSlider">Form Tambah Gambar Slider</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('administrator/gambar_slider/tambah_gambar_slider') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul" class="font-weight-bold">Judul Gambar:</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>

                <div class="form-group">
                    <label for="gambar" class="font-weight-bold">Gambar Slider </label>
                    <small class="font-italic d-block">(Wajib Untuk Mengupload Gambar, Rekomendasi 1200px x 300px)</small>
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

<!--Modal Detail Gambar Slider-->
<?php foreach ($gambarSliderAll as $gambarSlider) : ?>
    <div class="modal fade" id="modalDetailGambarSlider<?= $gambarSlider['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailGambarSlider" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailGambarSlider">Detail Gambar Slider</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url(); ?>uploads/gambar_slider/<?= $gambarSlider['gambar']; ?>" class="img-thumbnail mx-auto d-block mb-3" />
                    <dl class="row">
                        <dt class="col-sm-4">Judul Gambar</dt>
                        <dd class="col-sm-8"><?= $gambarSlider['judul']; ?></dd>
                        <dt class="col-sm-4">Waktu Upload Gambar</dt>
                        <dd class="col-sm-8"><?= date("d F Y H:i:s", strtotime($gambarSlider['created_at'])); ?></dd>
                        <?php if (is_null($gambarSlider['updated_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-4">Terakhir Diperbaharui</dt>
                            <dd class="col-sm-8"><?= date("d F Y H:i:s", strtotime($gambarSlider['updated_at'])); ?></dd>
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

<!--Modal Edit Gambar Slider-->
<?php
$i = 1;
foreach ($gambarSliderAll as $gambarSlider) : ?>
    <div class="modal fade" id="modalEditGambarSlider<?= $gambarSlider['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditGambarSlider" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditGambarSlider">Form Edit Gambar Slider</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open_multipart('administrator/gambar_slider/edit_gambar_slider') ?>
                <input type="hidden" name="id" value="<?= $gambarSlider['id']; ?>">
                <input type="hidden" name="gambar_lama" value="<?= $gambarSlider['gambar']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul Gambar:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $gambarSlider['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gambar" class="font-weight-bold">Gambar Slider </label>
                        <small class="font-italic d-block">(Wajib Untuk Mengupload Gambar, Rekomendasi 1200px x 300px)</small>
                        <div class="row px-3 pb-3">
                            <div id="upload_prev">
                                <img id="photoShowId<?= $i; ?>" src="<?= base_url(); ?>uploads/gambar_slider/<?= $gambarSlider['gambar']; ?>" class="img-thumbnail" width="200" />
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

<!--Modal Hapus Gambar Slider-->
<?php foreach ($gambarSliderAll as $gambarSlider) : ?>
    <div class="modal fade" id="modalHapusGambarSlider<?= $gambarSlider['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusgambarSlider" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusgambarSlider">Form Hapus Gambar Slider</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/gambar_slider/hapus_gambar_slider') ?>
                <input type="hidden" name="id" value="<?= $gambarSlider['id']; ?>">
                <input type="hidden" name="gambar" value="<?= $gambarSlider['gambar']; ?>">
                <div class="modal-body">
                    <img src="<?= base_url(); ?>uploads/gambar_slider/<?= $gambarSlider['gambar']; ?>" class="img-thumbnail mx-auto d-block mb-3" width="200" />
                    Apakah Anda Yakin Untuk Menghapus Gambar Slider <b><?= $gambarSlider['judul']; ?></b>?
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

<?php $index = count($gambarSliderAll); ?>
<input type="hidden" id="index" value="<?= $index; ?>">