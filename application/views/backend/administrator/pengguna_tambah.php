<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengguna</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/pengguna'); ?>">Pengguna</a></li>
                <li class=" breadcrumb-item active">Tambah Data Pengguna</li>
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

                    <?= form_open_multipart('administrator/pengguna/tambah_pengguna') ?>

                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label font-weight-bold">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nip" class="col-sm-4 col-form-label font-weight-bold">NIP
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nip" name="nip">
                            <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mata_pelajaran" class="col-sm-4 col-form-label font-weight-bold">Mata Pelajaran
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran">
                            <?= form_error('mata_pelajaran', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label font-weight-bold">NIK
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nik" name="nik">
                            <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label font-weight-bold">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <select class="form-control selectpicker" id="jenis_kelamin" name="jenis_kelamin" title="Pilih Jenis Kelamin">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-4 col-form-label font-weight-bold">Tempat Lahir</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                            <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-4 col-form-label font-weight-bold">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            <?= form_error('tanggal_lahir', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label font-weight-bold">Alamat
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-4 col-form-label font-weight-bold">No. Handphone
                            <small class="font-italic">(Boleh Dikosongkan Untuk Diisi Nanti)</small>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                            <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label font-weight-bold">Email <small class="font-italic">(Kosongkan Untuk Generate Email Otomatis)</small></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email">
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label font-weight-bold">Password Default <small class="font-italic">(Kosongkan Untuk Generate Default Password Otomatis)</small></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="password" name="password">
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-4 col-form-label font-weight-bold">Role
                            <small class="font-italic">(Hanya Bisa Diatur Oleh Akun Root, Default Guru)</small>
                        </label>
                        <div class="col-sm-8">
                            <?php if ($user['id'] == 1) : ?>
                                <select class="form-control selectpicker" id="role" name="role" title="Pilih Role">
                                <?php else : ?>
                                    <select class="form-control selectpicker" id="role" name="role" title="Pilih Role" disabled>
                                    <?php endif; ?>
                                    <option value="Guru">Guru</option>
                                    <option value="Administrator">Administrator</option>
                                    </select>
                                    <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-4 col-form-label font-weight-bold">Foto Profile <small class="font-italic">(Biarkan Kosong Untuk Memakai Gambar Default)</small></label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url(); ?>assets/backend/img/default-avatar.png" class="img-thumbnail" id="img">
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
                            <button type="submit" class="btn btn-success"><i class=" fas fa-fw fa-plus mr-1"></i>Tambah Data Pengguna</button>
                        </div>
                    </div>

                    <?= form_close(); ?>

                </div>

            </div>

        </div>

    </div>

</div>