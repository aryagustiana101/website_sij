<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Sambutan Ketua Kompetensi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/sambutan'); ?>">Sambutan</a></li>
                <li class="breadcrumb-item active">Edit Sambutan</li>
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
                <div class="card-body">
                    <?= form_open_multipart(base_url('administrator/sambutan/edit_sambutan')); ?>
                    <input type="hidden" id="id" name="id" value="<?= $sambutan['id']; ?>">
                    <input type="hidden" id="foto_lama" name="foto_lama" value="<?= $sambutan['foto']; ?>">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label font-weight-bold">Nama Ketua Kompetensi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $sambutan['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-4 col-form-label font-weight-bold">Foto Ketua Kompetensi</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url(); ?>./uploads/profile/<?= $sambutan['foto']; ?>" class="img-thumbnail" id="img">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="foto" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0]);">
                                        <label class="custom-file-label text-muted" for="image">Pilih Foto (PNG, JPG, JPEG)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summernote" class="font-weight-bold">Sambutan Ketua Kompetensi</label>
                        <textarea class="form-control" id="summernote" name="isi_sambutan"><?= $sambutan['isi_sambutan']; ?></textarea>
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