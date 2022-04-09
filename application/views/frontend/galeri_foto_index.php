<!-- Galeri foto -->
<section id="galeri" class="grid-gallery gallery-block">
    <div class="container">
        <div class="row my-3">
            <div class="col py-3 text-center">
                <!-- Judul Banner -->
                <h2 class="font-weight-bolder">Galeri Foto Website SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <div class="row my-3 justify-content-center">
            <?php foreach ($galeriFotoAll as $galeriFoto) : ?>
                <div class="card col-md-3 col-12 col-sm-5 ml-1 mb-3">
                    <!-- Foto -->
                    <a href="<?= base_url(); ?>uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" data-toggle="lightbox" data-gallery="gallery" class="lightbox">
                        <img src="<?= base_url(); ?>uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" class="w-100 img-fluid rounded scale-on-hover">
                    </a>
                    <!-- Judul Foto -->
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $galeriFoto['judul']; ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>