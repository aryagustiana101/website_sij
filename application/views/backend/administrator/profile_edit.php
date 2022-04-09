<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/profile'); ?>">Profile</a></li>
                <li class=" breadcrumb-item active">Edit Profile</li>
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

                    <?= form_open_multipart('administrator/profile/edit_profile') ?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label font-weight-bold">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nip" class="col-sm-4 col-form-label font-weight-bold">NIP
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if (is_null($user['nip'])) : ?>
                                <input type="text" class="form-control" id="nip" name="nip">
                            <?php else : ?>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?= $user['nip']; ?>">
                            <?php endif; ?>
                            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mata_pelajaran" class="col-sm-4 col-form-label font-weight-bold">Mata Pelajaran
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if (is_null($user['mata_pelajaran'])) : ?>
                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                            <?php else : ?>
                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="<?= $user['mata_pelajaran'] ?>">
                            <?php endif; ?>
                            <?= form_error('mata_pelajaran', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label font-weight-bold">NIK
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if (is_null($user['nik'])) : ?>
                                <input type="text" class="form-control" id="nik" name="nik">
                            <?php else : ?>
                                <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>">
                            <?php endif; ?>
                            <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label font-weight-bold">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <?php if ($user['jenis_kelamin'] == 'Laki-Laki') : ?>
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                <?php else : ?>
                                    <option value="Laki-Laki" selected>Laki-Laki</option>
                                <?php endif; ?>
                                <?php if ($user['jenis_kelamin'] == 'Perempuan') : ?>
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
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= ucwords(strtolower($user['tempat_lahir'])); ?>">
                            <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-4 col-form-label font-weight-bold">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime($user['tanggal_lahir'])); ?>">
                            <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label font-weight-bold">Alamat
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if (is_null($user['alamat'])) : ?>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            <?php else : ?>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= ucwords(strtolower($user['alamat'])); ?>">
                            <?php endif; ?>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-4 col-form-label font-weight-bold">No. Handphone
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if (is_null($user['no_hp'])) : ?>
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            <?php else : ?>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp']; ?>">
                            <?php endif; ?>
                            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-4 col-form-label font-weight-bold">Foto Profile</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (is_null($user['foto'])) : ?>
                                        <img src="<?= base_url(); ?>assets/backend/img/default-avatar.png" class="img-thumbnail" id="img">
                                    <?php else : ?>
                                        <img src="<?= base_url(); ?>./uploads/profile/<?= $user['foto']; ?>" class="img-thumbnail" id="img">
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

                    <div class="form-group row mt-5">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class=" fas fa-pencil-alt mr-1"></i>Edit Profile</button>
                        </div>
                    </div>

                    <?= form_close(); ?>

                </div>

            </div>

        </div>

    </div>

</div>