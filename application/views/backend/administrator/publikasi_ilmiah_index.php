<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publikasi Ilmiah</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Publikasi Ilmiah</li>
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
                        <a class="btn btn-success btn-sm mb-3" href="#" data-toggle="modal" data-target="#modalTambahPublikasiIlmiah"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Publikasi Ilmiah</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <h6 class="font-weight-bold">Export Data Publikasi Ilmiah:</h6>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Nama Penulis</th>
                                    <th>Level Penulis</th>
                                    <th>Waktu Publikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($publikasiIlmiahAll as $publikasiIlmiah) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $publikasiIlmiah['judul']; ?></td>
                                        <td><?= $publikasiIlmiah['nama_penulis']; ?></td>
                                        <td><?= $publikasiIlmiah['level_penulis']; ?></td>
                                        <td><?= date("d F Y H:i:s", strtotime($publikasiIlmiah['created_at'])); ?></td>
                                        <td>
                                            <a href="<?= base_url('administrator/publikasi_ilmiah/detail_publikasi_ilmiah/') . $publikasiIlmiah['id']; ?>" class=" btn btn-sm btn-success mb-2"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="#" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalEditPublikasiIlmiah<?= $publikasiIlmiah['id']; ?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modalHapusPublikasiIlmiah<?= $publikasiIlmiah['id']; ?>"><i class=" fas fa-fw fa-trash-alt"></i></a>
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

<!--Modal Tambah Publikasi Ilmiah-->
<div class="modal fade" id="modalTambahPublikasiIlmiah" tabindex="-1" role="dialog" aria-labelledby="modalTambahPublikasiIlmiah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahPublikasiIlmiah">Form Tambah Publikasi Ilmiah</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('administrator/publikasi_ilmiah/tambah_publikasi_ilmiah'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul" class="font-weight-bold">Judul Publikasi Ilmiah:</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="form-group">
                    <label for="nama_penulis" class="font-weight-bold">Nama Penulis Publikasi Ilmiah: <small class="font-italic">(Biarkan Kosong, Default Sesuai Nama Akun)</small></label>
                    <input type="text" class="form-control" id="nama_penulis" name="nama_penulis">
                </div>
                <div class="form-group">
                    <label for="level_penulis" class="font-weight-bold">Level Penulis Publikasi Ilmiah: <small class="font-italic">(Biarkan Kosong, Default Sesuai Role Akun)</small></label>
                    <select class="form-control selectpicker" id="level_penulis" name="level_penulis" title="Pilih Level Penulis...">
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                        <option value="Administrator">Administrator</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="file_publikasi_ilmiah" class="font-weight-bold">File Publikasi Ilmiah:</label>
                    <input id="input-b9" name="file_publikasi_ilmiah" type="file" data-msg-placeholder="Pilih File Publikasi Ilmiah (PDF)">
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

<!--Modal Edit Publikasi Ilmiah-->
<?php
$i = 1;
foreach ($publikasiIlmiahAll as $publikasiIlmiah) : ?>
    <div class="modal fade" id="modalEditPublikasiIlmiah<?= $publikasiIlmiah['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditPublikasiIlmiah" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditPublikasiIlmiah">Form Edit Publikasi Ilmiah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open_multipart('administrator/publikasi_ilmiah/edit_publikasi_ilmiah') ?>
                <input type="hidden" name="id" value="<?= $publikasiIlmiah['id']; ?>">
                <input type="hidden" name="file_publikasi_ilmiah_lama" value="<?= $publikasiIlmiah['file_publikasi_ilmiah']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul Publikasi Ilmiah:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $publikasiIlmiah['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_penulis" class="font-weight-bold">Nama Penulis Publikasi Ilmiah: <small class="font-italic">(Biarkan Kosong, Default Sesuai Nama Akun)</small></label>
                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" value="<?= $publikasiIlmiah['nama_penulis']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="level_penulis" class="font-weight-bold">Level Penulis Publikasi Ilmiah: <small class="font-italic">(Biarkan Kosong, Default Sesuai Role Akun)</small></label>
                        <select class="form-control selectpicker" id="level_penulis" name="level_penulis" title="Pilih Level Penulis...">
                            <?php if ($publikasiIlmiah['level_penulis'] == 'Guru') : ?>
                                <option value="Guru" selected>Guru</option>
                            <?php else : ?>
                                <option value="Guru">Guru</option>
                            <?php endif; ?>
                            <?php if ($publikasiIlmiah['level_penulis'] == 'Siswa') : ?>
                                <option value="Siswa" selected>Siswa</option>
                            <?php else : ?>
                                <option value="Siswa">Siswa</option>
                            <?php endif; ?>
                            <?php if ($publikasiIlmiah['level_penulis'] == 'Administrator') : ?>
                                <option value="Administrator" selected>Administrator</option>
                            <?php else : ?>
                                <option value="Administrator">Administrator</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file_publikasi_ilmiah" class="font-weight-bold">File Publikasi Ilmiah: <small class="font-italic">(Upload File Publikasi Ilmiah Baru, Jika Ingin Dirubah)</small></label>
                        <input id="input-b<?= $i; ?>" name="file_publikasi_ilmiah" type="file" data-msg-placeholder="Pilih File Publikasi Ilmiah (PDF)">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-fw fa-pencil-alt mr-1"></i> Edit</button>
                    </div>
                </div>
                <?php $i++; ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--Modal Hapus Publikasi Ilmiah-->
<?php foreach ($publikasiIlmiahAll as $publikasiIlmiah) : ?>
    <div class="modal fade" id="modalHapusPublikasiIlmiah<?= $publikasiIlmiah['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusPublikasiIlmiah" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusPublikasiIlmiah">Form Hapus Publikasi Ilmiah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/publikasi_ilmiah/hapus_publikasi_ilmiah') ?>
                <input type="hidden" name="id" value="<?= $publikasiIlmiah['id']; ?>">
                <input type="hidden" name="file_publikasi_ilmiah_lama" value="<?= $publikasiIlmiah['file_publikasi_ilmiah']; ?>">
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Publikasi Ilmiah <b><?= $publikasiIlmiah['judul']; ?></b> Yang Ditulis Oleh <b><?= $publikasiIlmiah['nama_penulis']; ?></b>, Dan Diterbitkan Pada <b><?= date("d F Y H:i:s", strtotime($publikasiIlmiah['created_at'])); ?></b>?
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

<?php $index = count($publikasiIlmiahAll); ?>
<input type="hidden" id="indexp" value="<?= $index; ?>">