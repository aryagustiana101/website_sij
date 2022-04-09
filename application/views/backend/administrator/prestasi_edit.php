<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Prestasi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/prestasi'); ?>">Prestasi</a></li>
                <li class="breadcrumb-item active">Edit Prestasi</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart(base_url('administrator/prestasi/edit_prestasi/' . $prestasi['id'])); ?>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-4 col-form-label font-weight-bold">Judul Prestasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $prestasi['judul']; ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-sm-4 col-form-label font-weight-bold">Foto Prestasi <small class="font-italic">(Biarkan Kosong Untuk Memakai Gambar Default)</small></label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php if (is_null($prestasi['foto'])) : ?>
                                        <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="img-thumbnail" id="img">
                                    <?php else : ?>
                                        <img src="<?= base_url(); ?>./uploads/prestasi/<?= $prestasi['foto']; ?>" class="img-thumbnail" id="img">
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="hidden" id="checkinpt" name="check_default_image" value='false'>

                                        <input type="file" class="custom-file-input" id="image" name="foto" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0]);
                                        document.getElementById('checkinpt').value='false';">
                                        <label class="custom-file-label text-muted" for="image">Pilih Foto (PNG, JPG, JPEG), Rekomedasi 600px</label>

                                        <button type="button" class="mt-3 btn btn-light" onclick="
                                        document.getElementById('img').src='<?= base_url(); ?>assets/backend/img/default-no-image.png';
                                        document.getElementById('checkinpt').value='true';">Gunakan Gambar Default</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summernote" class="font-weight-bold">Isi Detail Prestasi</label>
                        <textarea class="form-control" id="summernote" name="detail_prestasi"><?= $prestasi['detail_prestasi']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-pencil-alt mr-1"></i> Edit</button>
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>