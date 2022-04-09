<div class="container-fluid">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sambutan Ketua Kompetensi</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('administrator/dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Sambutan</li>
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
                <div class="row no-gutters p-4">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>uploads/profile/<?= $sambutan['foto']; ?>" class="img-thumbnail rounded">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p><?= $sambutan['isi_sambutan']; ?></p>
                            <p><?= $sambutan['nama']; ?></p>
                            <p>Terakhir Diperbaharui: <?= date('l d F Y H:i:s', strtotime($sambutan['updated_at'])); ?></p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-primary mr-3" href="<?= base_url('administrator/sambutan/edit_sambutan'); ?>"><i class="fas fa-pencil-alt mr-1"></i> Edit Sambutan</a>
                </div>
            </div>
        </div>
    </div>
</div>