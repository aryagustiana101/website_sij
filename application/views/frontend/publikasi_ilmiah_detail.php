<!-- Publikasi Ilmiah -->
<section id="publikasi_ilmiah">
    <div class="container">
        <!-- Judul Publikasi Ilmiah -->
        <div class="row mb-3">
            <div class="col py-3 text-left position-relative">
                <h2 class="font-weight-bolder"><?= $publikasiIlmiah['judul']; ?></h2>
                <hr class="bg-warning m-auto rounded position-absolute" style="height: 4px; width: 80px; left: 1em;">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <!-- Pengirim -->
                <div class="sender pb-3 d-inline">
                    <i class="fas fa-fw fa-user-edit d-inline text-primary"></i>
                    <p class="d-inline">oleh: <strong class="text-primary"><?= $publikasiIlmiah['nama_penulis']; ?></strong></p>
                </div>
                <div class="sender pb-3 mx-5 d-inline">
                    <i class="fas fa-fw fa-user-tie d-inline text-primary"></i>
                    <p class="d-inline">tingkat: <strong class="text-primary"><?= $publikasiIlmiah['level_penulis']; ?></strong></p>
                </div>
                <!-- Tanggal -->
                <div class="sender pb-3 mx-5 d-inline">
                    <i class="fas fa-fw fa-calendar-alt d-inline text-primary"></i>
                    <p class="d-inline"> <em><?= date("l, d F Y H:i:s", strtotime($publikasiIlmiah['created_at'])); ?></em> </p>
                </div>
                <hr class="bg-warning m-auto rounded position-absolute" style="height: 4px; width: 80px; left: 1em; bottom: .2em;">
            </div>
            <!-- Detail Publikasi Ilmiah -->
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row px-1" style="height: 1100px;">
                            <iframe src="<?= base_url(); ?>assets/frontend/vendor/pdfjs/web/viewer.html?file=<?= base_url(); ?>uploads/publikasi_ilmiah/<?= $publikasiIlmiah['file_publikasi_ilmiah']; ?>#zoom=100" width="100%" height="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fallback link -->
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <a href="<?= base_url(); ?>publikasi_ilmiah" class="card-link float-right text-warning">Kembali Ke Halaman Publikasi Ilmiah</a>
            </div>
        </div>
    </div>
</section>