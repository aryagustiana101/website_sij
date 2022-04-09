<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Publikasi Ilmiah</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('guru/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('guru/publikasi_ilmiah'); ?>">Publikasi Ilmiah</a></li>
                <li class="breadcrumb-item active">Detail Publikasi Ilmiah</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Publikasi Ilmiah Anda</h6>
                </div>
                <div class="card-body">
                    <dl class="row px-4">
                        <dt class="col-sm-3">Judul Publikasi Ilmiah</dt>
                        <dd class="col-sm-9"><?= $publikasiIlmiah['judul']; ?></dd>
                        <dt class="col-sm-3">Penulis Publikasi Ilmiah</dt>
                        <dd class="col-sm-9"><?= $publikasiIlmiah['nama_penulis']; ?></dd>
                        <dt class="col-sm-3">Waktu Diterbitkan</dt>
                        <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($publikasiIlmiah['created_at'])); ?></dd>
                        <?php if (is_null($publikasiIlmiah['updated_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-3">Terakhir Diperbaharui</dt>
                            <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($publikasiIlmiah['updated_at'])); ?></dd>
                        <?php endif; ?>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Baca Publikasi Ilmiah Anda</h6>
                </div>
                <div class="card-body">
                    <div class="row px-1" style="height: 1100px;">
                        <iframe src="<?= base_url(); ?>assets/backend/vendor/pdfjs/web/viewer.html?file=<?= base_url(); ?>uploads/publikasi_ilmiah/<?= $publikasiIlmiah['file_publikasi_ilmiah']; ?>#zoom=100" width="100%" height="100%"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>