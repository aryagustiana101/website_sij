<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/profile'); ?>">Profile</a></li>
                <li class=" breadcrumb-item active">Ubah Password</li>
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

                    <?= form_open_multipart('administrator/profile/ubah_password') ?>

                    <div class="form-group row">
                        <label for="password_saat_ini" class="col-sm-4 col-form-label font-weight-bold">Password Saat Ini</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_saat_ini" name="password_saat_ini">
                            <?= form_error('password_saat_ini', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_baru" class="col-sm-4 col-form-label font-weight-bold">Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_baru" name="password_baru">
                            <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password_baru_ulangi" class="col-sm-4 col-form-label font-weight-bold">Ulangi Password Baru</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password_baru_ulangi" name="password_baru_ulangi">
                            <?= form_error('password_baru_ulangi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class=" fas fa-key mr-1"></i>Ubah Password</button>
                        </div>
                    </div>

                    <?= form_close(); ?>

                </div>

            </div>

        </div>

    </div>

</div>

