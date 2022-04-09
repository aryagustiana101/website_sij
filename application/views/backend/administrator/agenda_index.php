<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agenda</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Agenda</li>
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
                        <a class="btn btn-success btn-sm mb-3" href="#" data-toggle="modal" data-target="#modalTambahAgenda"><i class="fas fa-fw fa-plus mr-1"></i> Tambah Agenda</a>
                    </div>
                    <h6 class="font-weight-bold">Export Data Agenda:</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($agendaAll as $agenda) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $agenda['judul']; ?></td>
                                        <td><?= $agenda['lokasi']; ?></td>
                                        <td><?= date("d F Y", strtotime($agenda['tanggal'])); ?></td>
                                        <?php if (is_null($agenda['waktu_selesai'])) : ?>
                                            <td><?= date('H:i', strtotime($agenda['waktu_mulai'])); ?> - selesai</td>
                                        <?php else : ?>
                                            <td><?= date('H:i', strtotime($agenda['waktu_mulai'])); ?> - <?= date('H:i', strtotime($agenda['waktu_selesai'])); ?></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#" class=" btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#modalDetailAgenda<?= $agenda['id']; ?>"><i class="fas fa-fw fa-search-plus"></i></a>
                                            <a href="#" class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#modalEditAgenda<?= $agenda['id']; ?>"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                            <a href="" # class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#modalHapusAgenda<?= $agenda['id']; ?>"><i class="fas fa-fw fa-trash-alt"></i></a>
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

<!--Modal Tambah Agenda-->
<div class="modal fade" id="modalTambahAgenda" tabindex="-1" role="dialog" aria-labelledby="modalTambahAgenda" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAgenda">Form Tambah Agenda</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('administrator/agenda/tambah_agenda') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="judul" class="font-weight-bold">Judul Agenda:</label>
                    <input type="text" class="form-control" id="judul" name="judul">
                </div>
                <div class="form-group">
                    <label for="lokasi" class="font-weight-bold">Lokasi Agenda:</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi">
                </div>
                <div class="form-group">
                    <label for="tanggal" class="font-weight-bold">Tanggal Agenda:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                <div class="form-group">
                    <label for="waktu_mulai" class="font-weight-bold">Waktu Mulai:</label>
                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai">
                </div>
                <div class="form-group">
                    <label for="waktu_selesai" class="font-weight-bold">Waktu Selesai <small class="font-italic">(Boleh Dikosongkan, Default Sampai Dengan Selesai)</small>:</label>
                    <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai">
                </div>
                <div class="form-group">
                    <label for="detail" class="font-weight-bold">Detail Agenda
                        <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>:
                    </label>
                    <textarea class="form-control" id="detail" name="detail"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-fw fa-plus mr-1"></i>Tambah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!--Modal Detal Agenda-->
<?php foreach ($agendaAll as $agenda) : ?>
    <div class="modal fade" id="modalDetailAgenda<?= $agenda['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailAgenda" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailAgenda">Detail Agenda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="id" value="<?= $agenda['id']; ?>">
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">Judul Agenda</dt>
                        <dd class="col-sm-8"><?= $agenda['judul']; ?></dd>
                        <dt class="col-sm-4">Lokasi Agenda</dt>
                        <dd class="col-sm-8"><?= $agenda['lokasi']; ?></dd>
                        <dt class="col-sm-4">Tanggal Angeda</dt>
                        <dd class="col-sm-8"><?= date("d F Y", strtotime($agenda['tanggal'])); ?></dd>
                        <dt class="col-sm-4">Waktu Mulai</dt>
                        <dd class="col-sm-8"><?= date('H:i', strtotime($agenda['waktu_mulai'])); ?></dd>
                        <dt class="col-sm-4">Waktu Selesai</dt>
                        <?php if (is_null($agenda['waktu_selesai'])) : ?>
                            <dd class="col-sm-8">Sampai Dengan Selesai</dd>
                        <?php else : ?>
                            <dd class="col-sm-8"><?= date('H:i', strtotime($agenda['waktu_selesai'])); ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-4">Detail:</dt>
                        <?php if (is_null($agenda['detail'])) : ?>
                            <dd class="col-sm-12">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-12"><?= $agenda['detail']; ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--Modal Edit Agenda-->
<?php foreach ($agendaAll as $agenda) : ?>
    <div class="modal fade" id="modalEditAgenda<?= $agenda['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditAgenda" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditAgenda">Form Edit Agenda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/agenda/edit_agenda') ?>
                <input type="hidden" name="id" value="<?= $agenda['id']; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul Agenda:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $agenda['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="lokasi" class="font-weight-bold">Lokasi Agenda:</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $agenda['lokasi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="font-weight-bold">Tanggal Agenda:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= date('Y-m-d', strtotime($agenda['tanggal'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="waktu_mulai" class="font-weight-bold">Waktu Mulai:</label>
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="<?= date('H:i', strtotime($agenda['waktu_mulai'])); ?>">
                    </div>

                    <div class="form-group">
                        <label for="waktu_selesai" class="font-weight-bold">Waktu Selesai <small class="font-italic">(Boleh Dikosongkan, Default Sampai Dengan Selesai)</small>:</label>
                        <?php if (is_null($agenda['waktu_selesai'])) : ?>
                            <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai">

                        <?php else : ?>
                            <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="<?= date('H:i', strtotime($agenda['waktu_selesai'])); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="detail" class="font-weight-bold">Detail Agenda
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>:
                        </label>
                        <?php if (is_null($agenda['detail'])) : ?>
                            <textarea class="form-control" id="detail" name="detail"></textarea>
                        <?php else : ?>
                            <textarea class="form-control" id="detail" name="detail"><?= $agenda['detail']; ?></textarea>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-fw fa-pencil-alt mr-1"></i> Edit</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!--Modal Hapus Agenda-->
<?php foreach ($agendaAll as $agenda) : ?>
    <div class="modal fade" id="modalHapusAgenda<?= $agenda['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusAgenda" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusAgenda">Form Hapus Agenda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <?= form_open('administrator/agenda/hapus_agenda') ?>
                <input type="hidden" name="id" value="<?= $agenda['id']; ?>">
                <div class="modal-body">
                    Apakah Anda Yakin Untuk Menghapus Agenda <b><?= $agenda['judul']; ?></b>, tanggal <b><?= date("d F Y", strtotime($agenda['tanggal'])); ?></b> ?
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