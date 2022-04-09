<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if (is_null($user['foto'])) : ?>
                        <img src="<?= base_url(); ?>assets/backend/img/default-avatar.png" class="mx-auto d-block img-thumbnail rounded-circle mb-4" width="200" height="200">
                    <?php else : ?>
                        <img src="<?= base_url(); ?>uploads/profile/<?= $user['foto']; ?>" class="mx-auto d-block img-thumbnail rounded-circle mb-4" width="200" height="200">
                    <?php endif; ?>

                    <dl class="row">
                        <dt class="col-sm-3">Nama</dt>
                        <dd class="col-sm-9"><?= $user['nama']; ?></dd>
                        <dt class="col-sm-3">NIP</dt>
                        <?php if (is_null($user['nip'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $user['nip']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Mata Pelajaran</dt>
                        <?php if (is_null($user['mata_pelajaran'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $user['mata_pelajaran']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">NIK</dt>
                        <?php if (is_null($user['nik'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $user['nik']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Jenis Kelamin</dt>
                        <dd class="col-sm-9"><?= $user['jenis_kelamin']; ?></dd>
                        <dt class="col-sm-3">Tempat Lahir</dt>
                        <dd class="col-sm-9"><?= ucwords(strtolower($user['tempat_lahir'])); ?></dd>
                        <dt class="col-sm-3">Tanggal Lahir Lahir</dt>
                        <dd class="col-sm-9"><?= date("d F Y", strtotime($user['tanggal_lahir'])); ?></dd>
                        <dt class="col-sm-3">Alamat</dt>
                        <?php if (is_null($user['alamat'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= ucwords(strtolower($user['alamat'])); ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">No. Handphone</dt>
                        <?php if (is_null($user['no_hp'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $user['no_hp']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Email</dt>
                        <?php if (is_null($user['email'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $user['email']; ?></dd>
                        <?php endif; ?>
                    </dl>

                    <a href="<?= base_url('administrator/profile/edit_profile'); ?>" class="btn btn-sm btn-primary mr-3"><i class="fas fa-pencil-alt mr-1"></i> Edit Profile</a>
                    <a href="#" data-toggle="modal" data-target="#ubahEmailModal" class="btn btn-sm btn-primary mr-3"><i class="fas fa-envelope mr-1"></i> Ubah Email</a>
                    <a href="<?= base_url('administrator/profile/ubah_password'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-key mr-1"></i> Ubah Password</a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Ubah Email Modal-->
<div class="modal fade" id="ubahEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Email</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open_multipart('administrator/profile/ubah_email') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email_baru" class="font-weight-bold">Email Baru:</label>
                    <input type="text" class="form-control" id="email_baru" name="email_baru" placeholder="Masukan Email Aktif Baru...">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-pencil-alt mr-1"></i> Ubah</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
