<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/pengguna'); ?>">Pengguna</a></li>
                <li class=" breadcrumb-item active">Edit Pengguna</li>
            </ul>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>

                <div class="card-body p-5">

                    <?= form_open_multipart('administrator/pengguna/edit_pengguna/' . $dataPengguna['id']); ?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label font-weight-bold">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dataPengguna['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nip" class="col-sm-4 col-form-label font-weight-bold">NIP
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if (is_null($dataPengguna['nip'])) : ?>
                                <input type="text" class="form-control" id="nip" name="nip">
                            <?php else : ?>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $dataPengguna['nip']; ?>">
                            <?php endif; ?>
                            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mata_pelajaran" class="col-sm-4 col-form-label font-weight-bold">Mata Pelajaran <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small></label>
                        <div class="col-sm-8">
                            <?php if (is_null($dataPengguna['mata_pelajaran'])) : ?>
                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                            <?php else : ?>
                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="<?= $dataPengguna['mata_pelajaran'] ?>">
                            <?php endif; ?>
                            <?= form_error('mata_pelajaran', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label font-weight-bold">NIK <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small></label>
                        <div class="col-sm-8">
                            <?php if (is_null($dataPengguna['nik'])) : ?>
                                <input type="text" class="form-control" id="nik" name="nik">
                            <?php else : ?>
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $dataPengguna['nik']; ?>">
                            <?php endif; ?>
                            <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label font-weight-bold">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control selectpicker" id="jenis_kelamin" name="jenis_kelamin" title="Pilih Jenis Kelamin...">
                                <?php if ($dataPengguna['jenis_kelamin'] == 'Laki-Laki') : ?>
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                <?php else : ?>
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                <?php endif; ?>
                                <?php if ($dataPengguna['jenis_kelamin'] == 'Perempuan') : ?>
                                    <option value="Perempuan" selected>Perempuan</option>
                                <?php else : ?>
                                    <option value="Perempuan">Perempuan</option>
                                <?php endif; ?>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-4 col-form-label font-weight-bold">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= ucwords(strtolower($dataPengguna['tempat_lahir'])); ?>">
                            <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-4 col-form-label font-weight-bold">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime($dataPengguna['tanggal_lahir'])); ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label font-weight-bold">Alamat <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small></label>
                        <div class="col-sm-8">
                            <?php if (is_null($dataPengguna['alamat'])) : ?>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            <?php else : ?>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= ucwords(strtolower($dataPengguna['alamat'])); ?>">
                            <?php endif; ?>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-4 col-form-label font-weight-bold">No. Handphone <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small></label>
                        <div class="col-sm-8">
                            <?php if (is_null($dataPengguna['no_hp'])) : ?>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            <?php else : ?>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $dataPengguna['no_hp']; ?>">
                            <?php endif; ?>
                            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-4 col-form-label font-weight-bold">Foto Profile</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (is_null($dataPengguna['foto'])) : ?>
                                        <img src="<?= base_url(); ?>assets/backend/img/default-avatar.png" class="img-thumbnail" id="img">
                                    <?php else : ?>
                                        <img src="<?= base_url(); ?>./uploads/profile/<?= $dataPengguna['foto']; ?>" class="img-thumbnail" id="img">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="hidden" id="checkinpt" name="check_default_image" value='false'>
                                        <input type="file" class="custom-file-input" id="image" name="foto" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0]);
                                        document.getElementById('checkinpt').value='false';">
                                        <label class="custom-file-label text-muted" for="image">Pilih Foto (PNG, JPG, JPEG)</label>

                                        <button type="button" class="mt-3 btn btn-light" onclick="
                                        document.getElementById('img').src='<?= base_url(); ?>assets/backend/img/default-avatar.png';
                                        document.getElementById('checkinpt').value='true';">Gunakan Gambar Default</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-4 col-form-label font-weight-bold">Role
                            <small class="font-italic">(Hanya Bisa Diubah Oleh Akun Root)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if ($user['id'] == 1) : ?>
                                <select class="form-control selectpicker" id="role" name="role" title="Pilih Role">
                                <?php else : ?>
                                    <select class="form-control selectpicker" id="role" name="role" title="Pilih Role" disabled>
                                    <?php endif; ?>

                                    <?php if ($dataPengguna['role'] == 'Guru') : ?>
                                        <option value="Guru" selected>Guru</option>
                                    <?php else : ?>
                                        <option value="Guru" selected>Guru</option>
                                    <?php endif; ?>
                                    <?php if ($dataPengguna['role'] == 'Administrator') : ?>
                                        <option value="Administrator" selected>Administrator</option>
                                    <?php else : ?>
                                        <option value="Administrator">Administrator</option>
                                    <?php endif; ?>
                                    </select>
                                    <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="active" class="col-sm-4 col-form-label font-weight-bold">Status <small class="font-italic">(Hanya Bisa Diubah Oleh Akun Root)</small></label>
                        <div class="col-sm-8 mt-2">
                            <?php if ($dataPengguna['active'] == 1) : ?>
                                <?php if ($user['id'] == 1) : ?>
                                    <input type="checkbox" class="form-check-input" id="active" name="active" checked value="1">
                                <?php else : ?>
                                    Aktif
                                <?php endif; ?>
                            <?php else : ?>
                                <?php if ($user['id'] == 1) : ?>
                                    <input type="checkbox" class="form-check-input" id="active" name="active" value="1">
                                <?php else : ?>
                                    Tidak Aktif
                                <?php endif; ?>
                            <?php endif; ?>
                            <?= form_error('active', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class=" fas fa-pencil-alt mr-1"></i> Ubah Data</button>
                        </div>
                    </div>
                    <?= form_close(); ?>

                </div>

            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Email Pengguna Website SIJ</h6>
                </div>

                <div class="card-body p-5">
                    <?= form_open_multipart('administrator/pengguna/ubah_email/' . $dataPengguna['id']); ?>
                    <dl class="row">
                        <dt class="col-sm-3 mt-2">Email Saat Ini</dt>
                        <dd class="col-sm-9">
                            <div class="form-group row">
                                <input type="text" class="form-control" id="email_saat_ini" value="<?= $dataPengguna['email']; ?>" disabled>
                            </div>
                        </dd>

                        <dt class="col-sm-3 mt-2">Email Baru</dt>
                        <dd class="col-sm-9">
                            <div class="form-group row">
                                <input type="text" class="form-control" id="email_baru" placeholder="Masukan Email Aktif Baru..." name="email_baru">
                            </div>
                        </dd>

                        <dt class="col-sm-3 mt-2">
                            <button type="submit" class="btn btn-primary btn-sm"><i class=" fas fa-fw fa-envelope mr-1"></i> Ubah Email</button>
                        </dt>
                        <dd class="col-sm-9">
                        </dd>
                    </dl>
                    <?= form_close(); ?>

                </div>

            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reset Password Pengguna Website SIJ</h6>
                </div>

                <div class="card-body p-5">
                    <dl class="row">
                        <dt class="col-sm-3 mt-2">Password Saat Ini</dt>
                        <dd class="col-sm-9">
                            <div class="form-inline">
                                <input type="password" class="form-control mr-2 mb-1" id="password" value="<?= $dataPengguna['password_unhash']; ?>" disabled>
                                <button type="button" class="btn btn-sm btn-light" onclick="var x = document.getElementById('password'); var i = document.getElementById('iconpassword'); if (x.type==='password' ) { x.type='text' ; i.className = 'fas fa-fw fa-eye-slash'; } else { x.type='password';  i.className = 'fas fa-fw fa-eye'; }"><i class="fas fa-fw fa-eye" id="iconpassword"></i></button>
                            </div>
                        </dd>

                        <dt class="col-sm-3">Password Default</dt>
                        <dd class="col-sm-9 mb-4"><?= $dataPengguna['password_default']; ?></dd>

                        <dt class="col-sm-3">Tombol Reset Password</dt>
                        <dd class="col-sm-9 mb-4"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#resetTombol"><i class=" fas fa-redo-alt"></i></button></dd>
                        <small class="font-italic">(Klik Tombol Di Atas Untuk Mereset Password Pengguna Kembali Ke Password Default)</small>
                    </dl>
                </div>

            </div>
        </div>

    </div>

</div>

<div id="resetTombol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="resetTombol" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetTombol">Form Reset Password Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('administrator/pengguna/reset_password'); ?>
            <input type="hidden" name="id" value="<?= $dataPengguna['id']; ?>" />
            <input type="hidden" name="password_default" value="<?= $dataPengguna['password_default']; ?>" />
            <div class="modal-body">
                <p>
                    Apakah Anda Yakin Untuk Mereset Password Pengguna <b><?= $dataPengguna['nama']; ?> </b> Kembali Ke Password Default?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-redo-alt mr-2"></i>Reset</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>