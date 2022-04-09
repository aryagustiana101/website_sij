<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Prestasi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/prestasi'); ?>">Prestasi</a></li>
                <li class="breadcrumb-item active">Detail Prestasi</li>
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
                    <div class="p-4">
                        <h6 class="font-weight-bold">Foto Prestasi:</h6>
                        <?php if (is_null($prestasi['foto'])) : ?>
                            <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="d-block img-thumbnail" width="500" height="400">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>uploads/prestasi/<?= $prestasi['foto']; ?>" class=" d-block img-thumbnail" width="500" height="400">
                        <?php endif; ?>
                    </div>
                    <dl class="row px-4">
                        <dt class="col-sm-3">Judul Prestasi</dt>
                        <dd class="col-sm-9"><?= $prestasi['judul']; ?></dd>
                        <dt class="col-sm-3">Waktu Terbit Prestasi</dt>
                        <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($prestasi['created_at'])); ?></dd>
                        <?php if (is_null($prestasi['updated_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-3">Terakhir Diperbaharui</dt>
                            <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($prestasi['updated_at'])); ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Isi Detail Prestasi :</dt>
                    </dl>
                    <div class="px-4">
                        <div class="card p-3">
                            <?= $prestasi['detail_prestasi']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>