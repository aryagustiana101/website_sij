<!-- Berita -->
<section id="berita">
    <div class="container">
        <!-- Judul Berita -->
        <div class="row mb-3">
            <div class="col py-3 text-left position-relative">
                <h2 class="font-weight-bolder"><?= $prestasi['judul']; ?></h2>
                <hr class="bg-warning m-auto rounded position-absolute" style="height: 4px; width: 80px; left: 1em;">
            </div>
        </div>
        <div class="row mb-3">
            <!-- Gambar / Foto -->
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <?php if (is_null($prestasi['foto'])) : ?>
                    <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" alt="Foto Siswa SIJA tidak bisa ngoding" class="w-100 rounded img-fluid" style="max-width: 550px; max-width: 480px;">
                <?php else : ?>
                    <img src="<?= base_url(); ?>uploads/prestasi/<?= $prestasi['foto']; ?>" class="w-100 rounded img-fluid" style="max-width: 550px; max-width: 480px;">
                <?php endif; ?>
            </div>
            <!-- Tanggal-->
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <div class="sender pb-3 my-5 d-inline">
                    <i class="fas fa-fw fa-calendar-alt d-inline text-primary"></i>
                    <p class="d-inline"> <em><?= date("l, d F Y H:i:s", strtotime($prestasi['created_at'])); ?></em> </p>
                </div>
                <hr class="bg-warning m-auto rounded position-absolute" style="height: 4px; width: 80px; left: 1em; bottom: .2em;">
            </div>
            <!-- Detail prestasi -->
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <?= $prestasi['detail_prestasi']; ?>
                    </div>
                </div>
            </div>
            <!-- Fallback link -->
            <div class="col-12 col-sm-10 col-md-11 pb-3 mb-3">
                <a href="<?= base_url(); ?>prestasi" class="card-link float-right text-warning">Kembali Ke Halaman Prestasi</a>
            </div>
        </div>
    </div>
</section>