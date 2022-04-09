<!-- Berita -->
<section id="berita">
    <div class="container">
        <!-- Judul Banner -->
        <div class="row my-3">
            <div class="col py-3 text-center">
                <h2 class="font-weight-bolder">Berita SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <!-- Daftar berita -->
        <div class="row justify-content-center">
            <?php foreach ($beritaAll as $berita) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card mb-5">
                        <?php if (is_null($berita['gambar'])) : ?>
                            <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="w-100 img-fluid rounded" width="350" height="280">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>uploads/berita/<?= $berita['gambar']; ?>" class="w-100 img-fluid rounded" width="350" height="280">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder"><a href="<?= base_url(); ?>berita/detail_berita/<?= $berita['id']; ?>" class="text-decoration-none"><?= $berita['judul']; ?></a></h5>
                            <p class="card-text">
                                <?= ellipsize($berita['isi_berita'], 100); ?>
                            </p>
                            <a href="<?= base_url(); ?>berita/detail_berita/<?= $berita['id']; ?>" class="card-link">Baca Selengkapnya...</a>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <i class="fas fa-fw fa-calendar-alt text-warning"></i>
                                            <p class="d-inline text-muted font-italic"><?= date("d M Y", strtotime($berita['created_at'])); ?></p>
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-fw fa-user-edit text-warning"></i>
                                            <p class="d-inline text-muted font-italic"><?= $berita['penulis'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?= $this->pagination->create_links(); ?>
    </div>
</section>