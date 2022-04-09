<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/pengguna'); ?>">Pengguna</a></li>
                <li class="breadcrumb-item active">Detail Pengguna</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php if (is_null($penggunaData['foto'])) : ?>
                        <img src="<?= base_url(); ?>assets/backend/img/default-avatar.png" class="mx-auto d-block img-thumbnail rounded-circle mb-4" width="200" height="200">
                    <?php else : ?>
                        <img src="<?= base_url(); ?>uploads/profile/<?= $penggunaData['foto']; ?>" class="mx-auto d-block img-thumbnail rounded-circle mb-4" width="200" height="200">
                    <?php endif; ?>
                    <dl class="row p-4">
                        <dt class="col-sm-3">Nama</dt>
                        <dd class="col-sm-9"><?= $penggunaData['nama']; ?></dd>
                        <dt class="col-sm-3">NIP</dt>
                        <?php if (is_null($penggunaData['nip'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $penggunaData['nip']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Mata Pelajaran</dt>
                        <?php if (is_null($penggunaData['mata_pelajaran'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $penggunaData['mata_pelajaran']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">NIK</dt>
                        <?php if (is_null($penggunaData['nik'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $penggunaData['nik']; ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Jenis Kelamin</dt>
                        <dd class="col-sm-9"><?= $penggunaData['jenis_kelamin']; ?></dd>
                        <dt class="col-sm-3">Tempat Lahir</dt>
                        <dd class="col-sm-9"><?= ucwords(strtolower($penggunaData['tempat_lahir'])); ?></dd>
                        <dt class="col-sm-3">Tanggal Lahir Lahir</dt>
                        <dd class="col-sm-9"><?= date("d F Y", strtotime($penggunaData['tanggal_lahir'])); ?></dd>
                        <dt class="col-sm-3">Alamat</dt>
                        <?php if (is_null($penggunaData['alamat'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= ucwords(strtolower($penggunaData['alamat'])); ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">No. Handphone</dt>
                        <?php if (is_null($penggunaData['no_hp'])) : ?>
                            <dd class="col-sm-9">-</dd>
                        <?php else : ?>
                            <dd class="col-sm-9"><?= $penggunaData['no_hp']; ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Akun Pengguna</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <dl class="row p-4">
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9 mb-4"><?= $penggunaData['email']; ?></dd>

                        <dt class="col-sm-3">Role</dt>
                        <dd class="col-sm-9 mb-4">
                            <?php if ($penggunaData['id'] == 1) : ?>
                                <h6><?= $penggunaData['role']; ?> <span class="badge badge-primary">Root</span></h6>
                            <?php else : ?>
                                <?= $penggunaData['role']; ?>
                            <?php endif; ?>
                        </dd>

                        <dt class="col-sm-3">Status Akun</dt>
                        <?php if ($penggunaData['active'] == 1) : ?>
                            <dd class="col-sm-9 mb-4">Aktif</dd>
                        <?php else : ?>
                            <dd class="col-sm-9 mb-4">Tidak Aktif</dd>
                        <?php endif; ?>

                        <dt class="col-sm-3 mt-2">Password</dt>
                        <dd class="col-sm-9">
                            <div class="form-inline">
                                <input type="password" class="form-control mr-2 mb-1" id="password" value="<?= $penggunaData['password_unhash']; ?>" disabled>
                                <button type="button" class="btn btn-sm btn-light" onclick="var x = document.getElementById('password'); var i = document.getElementById('iconpassword'); if (x.type==='password' ) { x.type='text' ; i.className = 'fas fa-fw fa-eye-slash'; } else { x.type='password';  i.className = 'fas fa-fw fa-eye'; }"><i class="fas fa-fw fa-eye" id="iconpassword"></i></button>
                            </div>
                        </dd>

                        <dt class="col-sm-3">Password Default</dt>
                        <dd class="col-sm-9 mb-4"><?= $penggunaData['password_default']; ?></dd>

                        <dt class="col-sm-3">Dibuat Pada</dt>
                        <dd class="col-sm-9 mb-4"><?= date('l d F Y H:i:s', strtotime($penggunaData['created_at'])); ?></dd>
                        <?php if (is_null($penggunaData['deleted_at'])) : ?>
                            <dt class="col-sm-3">Terakhir Diperbaharui Pada</dt>
                            <dd class="col-sm-9 mb-4">-</dd>
                        <?php else : ?>
                            <dt class="col-sm-3">Terakhir Diperbaharui Pada</dt>
                            <dd class="col-sm-9 mb-4"><?= date('l d F Y H:i:s', strtotime($penggunaData['updated_at'])); ?></dd>
                        <?php endif; ?>
                        <?php if (is_null($penggunaData['deleted_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-3">Dinonaktifkan Pada</dt>
                            <dd class="col-sm-9 mb-4"><?= $penggunaData['deleted_at']; ?></dd>
                        <?php endif; ?>

                    </dl>

                </div>
            </div>
        </div>
    </div>
</div>