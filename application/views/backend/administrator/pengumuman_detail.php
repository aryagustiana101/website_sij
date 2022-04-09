<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengumuman</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/pengumuman'); ?>">Pengumuman</a></li>
                <li class="breadcrumb-item active">Detail Pengumuman</li>
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
                    <dl class="row px-4">
                        <dt class="col-sm-3">Judul Pengumuman</dt>
                        <dd class="col-sm-9"><?= $pengumuman['judul']; ?></dd>
                        <dt class="col-sm-3">Waktu Pengumuman</dt>
                        <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($pengumuman['created_at'])); ?></dd>
                        <?php if (is_null($pengumuman['updated_at'])) : ?>
                        <?php else : ?>
                            <dt class="col-sm-3">Terakhir Diperbaharui</dt>
                            <dd class="col-sm-9"><?= date("d F Y H:i:s", strtotime($pengumuman['updated_at'])); ?></dd>
                        <?php endif; ?>
                        <dt class="col-sm-3">Isi Pengumuman :</dt>
                    </dl>
                    <div class="px-4">
                        <div class="card p-3">
                            <?= $pengumuman['isi_pengumuman']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>