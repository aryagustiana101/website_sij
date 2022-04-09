<!-- Prestasi -->
<section id="prestasi">
    <div class="container">
        <div class="row my-3">
            <div class="col py-3 text-center">
                <!-- Judul -->
                <h2 class="font-weight-bolder">Prestasi Siswa SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <!-- Daftar Prestasi -->
        <div class="row justify-content-center">
            <?php foreach ($prestasiAll as $prestasi) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card mb-5">
                        <?php if (is_null($prestasi['foto'])) : ?>
                            <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="w-100 img-fluid rounded" width="350" height="280">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>uploads/prestasi/<?= $prestasi['foto']; ?>" class="w-100 img-fluid rounded" width="350" height="280">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder"><a href="<?= base_url(); ?>prestasi/detail_prestasi/<?= $prestasi['id']; ?>" class="text-decoration-none"><?= $prestasi['judul']; ?></a></h5>
                            <p class="card-text">
                                <?= ellipsize($prestasi['detail_prestasi'], 100); ?>
                            </p>
                            <a href="<?= base_url(); ?>prestasi/detail_prestasi/<?= $prestasi['id']; ?>" class="card-link">Baca Selengkapnya...</a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <i class="fas fa-fw fa-calendar-alt text-warning"></i>
                                    <p class="d-inline text-muted font-italic"><?= date("d M Y", strtotime($prestasi['created_at'])); ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div> <!-- Akhir daftar prestasi -->
    </div>
</section>