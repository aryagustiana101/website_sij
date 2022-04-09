<!-- Gambar Slider -->
<div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($gambarSliderAll as $gambarSlider) : ?>
            <?php if ($gambarSlider['created_at'] == $firstGambarSlider['created_at']) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>" class="active"></li>
            <?php else : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>"></li>
            <?php endif; ?>
            <?php $i++; ?>
        <?php endforeach; ?>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($gambarSliderAll as $gambarSlider) : ?>
            <?php if ($gambarSlider['created_at'] == $firstGambarSlider['created_at']) : ?>
                <div class="carousel-item active">
                    <img src="<?= base_url(); ?>uploads/gambar_slider/<?= $gambarSlider['gambar']; ?>" class="d-block w-100">
                </div>
            <?php else : ?>
                <div class="carousel-item">
                    <img src="<?= base_url(); ?>uploads/gambar_slider/<?= $gambarSlider['gambar']; ?>" class="d-block w-100">
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Banner Selamat Datang -->
<section id="welcome-banner" style="background-color: #f6f6f6;">
    <div class="container mb-5">
        <div class="row mb-4">
            <div class="col text-center p-3">
                <!-- Ucapan Selamat Datang -->
                <h2 class="font-weight-bolder">Selamat Datang Di Website SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6 text-center">
                <!-- About 1 -->
                <h5 class="font-weight-bold text-primary">Apa itu SIJ?</h5>
                <p>Sistem Informatika Jaringan Dan Aplikasi (SIJ) merupakan kompetensi keahlian bari di SMK Negeri
                    1 Garut yang berbasis Teknologi
                    Informasi Dan Komunikasi pada program keahlian Teknik Komputer dan Informatika</p>
            </div>
            <div class="col-md-6 text-center">
                <!-- About 2 -->
                <h5 class="font-weight-bold text-primary">Kenapa harus SIJA?</h5>
                <p>Sistem Informatika Jaringan Dan Aplikasi (SIJ) merupakan kompetensi keahlian berbasis Teknologi
                    Informasi Dan Komunikasi pada program keahlian Teknik Komputer dan Informatika</p>
            </div>
        </div>

    </div>
</section>

<!-- Berita, Pengumuman dan Agenda Terbaru -->
<section id="berita-agenda" class="mb-5">
    <div class="container">
        <div class="row my-4">
            <div class="col text-center p-3">
                <!-- Judul -->
                <h2 class="font-weight-bolder">Info Terbaru</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-7 col-sm-12">
                <h3 class="text-center font-weight-bold pb-3 mb-3">Berita</h3>
                <?php foreach ($beritaAll as $berita) : ?>
                    <div class="card mb-5">
                        <?php if (is_null($berita['gambar'])) : ?>
                            <img src="<?= base_url(); ?>assets/backend/img/default-no-image.png" class="w-100 rounded" height="380" alt="berita">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>uploads/berita/<?= $berita['gambar']; ?>" class="w-100 rounded" height="380">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bolder"><a href="" class="text-decoration-none text-dark"><?= $berita['judul']; ?></a></h5>
                            <p class="card-text">
                                <?= ellipsize($berita['isi_berita'], 100); ?>
                            </p>
                            <a href="<?= base_url(); ?>berita/detail_berita/<?= $berita['id']; ?>" class="card-link">Baca Selengkapnya...</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Agenda -->
            <div class="col-md-5 col sm-12">
                <h3 class="text-center font-weight-bold pb-3">Agenda</h3>
                <?php foreach ($agendaAll as $agenda) : ?>
                    <div class="rounded border mb-3">
                        <div class="mt-2 mb-2 p-1">
                            <div class="rounded float-left mx-3 bg-primary" style="width:fit-content;">
                                <div class="text-center font-weight-bold p-1">
                                    <h2><strong><?= date("d", strtotime($agenda['tanggal'])); ?></strong></h2>
                                </div>
                                <div class="bg-warning text-center font-weight-bold px-1 pb-1" style="width: 120px; height: 32px;">
                                    <h4><?= date("F", strtotime($agenda['tanggal'])); ?></h4>
                                </div>
                            </div>
                            <h6 class="text-primary">
                                <strong><a href="#" class="text-decoration-none" data-toggle="modal" data-target="#modalDetailAgenda<?= $agenda['id']; ?>"><?= $agenda['judul']; ?></a></strong>
                            </h6>
                            <span class="px-2 text-dark d-block">
                                <i class="fas fa-fw fa-map-marker-alt text-warning mr-1"></i>
                                <?= $agenda['lokasi']; ?>
                            </span>
                            <span class="px-2 text-dark d-block">
                                <i class="fas fa-fw fa-clock text-warning mr-1"></i>
                                <?php if (is_null($agenda['waktu_selesai'])) : ?>
                                    <?= date('H:i', strtotime($agenda['waktu_mulai'])); ?> - selesai
                                <?php else : ?>
                                    <?= date('H:i', strtotime($agenda['waktu_mulai'])); ?> - <?= date('H:i', strtotime($agenda['waktu_selesai'])); ?>
                                <?php endif; ?>
                            </span>
                            <a href="#" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#modalDetailAgenda<?= $agenda['id']; ?>">Detail</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($agendaAll as $agenda) : ?>
                    <div class="modal fade" id="modalDetailAgenda<?= $agenda['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailAgenda" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetailAgenda">Detail Agenda</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Judul Agenda</dt>
                                        <dd class="col-sm-8"><?= $agenda['judul']; ?></dd>
                                        <dt class="col-sm-4">Lokasi Agenda</dt>
                                        <dd class="col-sm-8"><?= $agenda['lokasi']; ?></dd>
                                        <dt class="col-sm-4">Tanggal Angeda</dt>
                                        <dd class="col-sm-8"><?= date("d F Y", strtotime($agenda['tanggal'])); ?></dd>
                                        <dt class="col-sm-4">Waktu Mulai</dt>
                                        <dd class="col-sm-8"><?= date('H:i', strtotime($agenda['waktu_mulai'])); ?></dd>
                                        <dt class="col-sm-4">Waktu Selesai</dt>
                                        <?php if (is_null($agenda['waktu_selesai'])) : ?>
                                            <dd class="col-sm-8">Sampai Dengan Selesai</dd>
                                        <?php else : ?>
                                            <dd class="col-sm-8"><?= date('H:i', strtotime($agenda['waktu_selesai'])); ?></dd>
                                        <?php endif; ?>
                                        <dt class="col-sm-4">Detail</dt>
                                        <?php if (is_null($agenda['detail'])) : ?>
                                            <dd class="col-sm-8">-</dd>
                                        <?php else : ?>
                                            <dd class="col-sm-8"><?= $agenda['detail']; ?></dd>
                                        <?php endif; ?>
                                    </dl>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Oke</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Pengumuman -->
                <h3 class="text-center font-weight-bold pb-3">Pengumuman</h3>
                <?php foreach ($pengumumanAll as $pengumuman) : ?>
                    <div class="rounded border mb-3">
                        <div class="mt-2 mb-2 p-1">
                            <div class="rounded float-left mx-3 bg-primary" style="width:fit-content;">
                                <div class="text-center font-weight-bold p-1">
                                    <h2><strong><?= date("d", strtotime($pengumuman['created_at'])); ?></strong></h2>
                                </div>
                                <div class="bg-warning text-center font-weight-bold px-1 pb-1" style="width: 120px; height: 32px;">
                                    <h4><?= date("F", strtotime($pengumuman['created_at'])); ?></h4>
                                </div>
                            </div>
                            <h6 class="text-primary">
                                <strong><a href="#" class="text-decoration-none" data-toggle="modal" data-target="#modalDetailPengumaman<?= $pengumuman['id']; ?>"><?= $pengumuman['judul']; ?></a></strong>
                            </h6>
                            <span class="px-2 text-dark d-block">
                                <i class="fas fa-fw fa-calendar-alt text-warning mr-1"></i>
                                <?= date("d F Y", strtotime($pengumuman['created_at'])); ?>
                            </span>
                            <span class="px-2 text-dark d-block">
                                <i class="fas fa-fw fa-clock text-warning mr-1"></i>
                                <?= date("H:i:s", strtotime($pengumuman['created_at'])); ?>
                            </span>
                            <a href="#" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#modalDetailPengumuman<?= $pengumuman['id']; ?>">Baca Pengumuman</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php foreach ($pengumumanAll as $pengumuman) : ?>
                    <div class="modal fade" id="modalDetailPengumuman<?= $pengumuman['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailPengumuman" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDetailPengumuman">Detail Pengumuman</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <dl class="row">
                                        <dt class="col-sm-4">Judul Pengumuman</dt>
                                        <dd class="col-sm-8"><?= $pengumuman['judul']; ?></dd>
                                        <dt class="col-sm-4">Waktu Pengumuman</dt>
                                        <dd class="col-sm-8"><?= date("d F Y H:i:s", strtotime($pengumuman['created_at'])); ?></dd>
                                    </dl>
                                    <div class="row px-3">
                                        <h6 class="font-weight-bold">Isi Pengumuman:</h6>
                                    </div>

                                    <div class="border px-3"><?= $pengumuman['isi_pengumuman']; ?></div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal">Oke</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Sambutan -->
<section id="sambutan" class="mb-5" style="background-color: #f6f6f6;">
    <div class=" container">
        <div class="row my-4">
            <div class="col text-center p-3">
                <!-- Judul -->
                <h2 class="font-weight-bolder">Sambutan Ketua Kompetensi SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>

        <div class="row my-4">
            <!-- Foto Ketua Jurusan -->
            <div class="col-md-4 col-sm-12 p-3">
                <img src="<?= base_url(); ?>uploads/profile/<?= $sambutan['foto']; ?>" class="rounded float-left float-sm-none" alt="..." width="300" height="300">
            </div>
            <div class="col-md-8 col-sm-12 p-3">
                <!-- isi Sambutan -->
                <?= $sambutan['isi_sambutan']; ?>
                <!-- Nama Ketua Jurusan -->
                <h5 class="font-weight-bold text-center text-sm-left">— <em><?= $sambutan['nama']; ?></em></h5>
            </div>
        </div>
    </div>
</section>

<!-- Galeri -->
<section id="galeri" class="mb-5">
    <div class="container">
        <div class="row my-4">
            <div class="col text-center">
                <h2 class="font-weight-bolder">Foto Terbaru</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <div class="owl-carousel owl-theme">
            <?php foreach ($galeriFotoAll as $galeriFoto) : ?>
                <img src="<?= base_url(); ?>uploads/galeri_foto/<?= $galeriFoto['gambar']; ?>" class="w-100 shadow rounded mb-4" />
            <?php endforeach; ?>
        </div>
    </div>
</section>