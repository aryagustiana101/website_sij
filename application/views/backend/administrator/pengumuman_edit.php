<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pengumuman</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/pengumuman'); ?>">Pengumuman</a></li>
                <li class="breadcrumb-item active">Edit Pengumuman</li>
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
                    <?= form_open(base_url('administrator/pengumuman/edit_pengumuman/' . $pengumuman['id'])); ?>
                    <div class="form-group row">
                        <label for="judul" class="col-sm-4 col-form-label font-weight-bold">Judul Pengumuman</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="judul" name="judul" value="<?= $pengumuman['judul']; ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="summernote" class="font-weight-bold">Isi Pengumuman</label>
                        <textarea class="form-control" id="summernote" name="isi_pengumuman"><?= $pengumuman['isi_pengumuman']; ?></textarea>
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