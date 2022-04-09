<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Berita</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/berita'); ?>">Berita</a></li>
                <li class="breadcrumb-item active">Detail Berita</li>
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
                        <h6 class="font-weight-bold">Gambar Thumbnail Berita:</h6>
                        <?php if (is_null($berita['gambar'])) : ?>
                            <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="d-block img-thumbnail" width="500" height="400">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>uploads/berita/<?= $berita['gambar']; ?>" class=" d-block img-thumbnail" width="500" height="400">
                        <?php endif; ?>
                    </div>
                    <dl class="row px-4">
                        <dt class="col-sm-3">Judul Berita</dt>
                        <dd class="col-sm-9"><?= $berita['judul']; ?></dd>
                        <dt class="col-sm-3">Penulis Berita</dt>
                        <dd class="col-sm-9"><?= $berita['penulis']; ?></dd>
                        <dt class="col-sm-3">Waktu Terbit Berita</dt>
                        <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($berita['created_at'])); ?></dd>
                        <?php if (is_null($berita['updated_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-3">Terakhir Diperbaharui</dt>
                            <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($berita['updated_at'])); ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Isi Berita :</dt>
                    </dl>
                    <div class="px-4">
                        <div class="card p-3">
                            <?= $berita['isi_berita']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>