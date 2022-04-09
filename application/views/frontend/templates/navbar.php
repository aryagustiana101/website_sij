<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo (kiri) -->
        <a href="<?= base_url(); ?>" class="navbar-brand">
            <img src="<?= base_url(); ?>/assets/frontend/img/logo-SIJ.png" alt="Logo SIJA" width="36" height="40">
        </a>

        <!-- Navigation (kanan) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto p-2">
                <?php if ($uriSegment == '' || $uriSegment == 'home') : ?>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-primary" href="<?= base_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home'); ?>">Home</a>
                    </li>
                <?php endif; ?>
                <?php if ($uriSegment == 'berita') : ?>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-primary" href="<?= base_url('berita'); ?>">Berita <span class="sr-only">(current)</span></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berita'); ?>">Berita</a>
                    </li>
                <?php endif; ?>
                <?php if ($uriSegment == 'pengajar') : ?>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-primary" href="<?= base_url('pengajar'); ?>">Pengajar <span class="sr-only">(current)</span></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pengajar'); ?>">Pengajar</a>
                    </li>
                <?php endif; ?>
                <?php if ($uriSegment == 'prestasi') : ?>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-primary" href="<?= base_url('prestasi'); ?>">Prestasi <span class="sr-only">(current)</span></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('prestasi'); ?>">Prestasi</a>
                    </li>
                <?php endif; ?>
                <?php if ($uriSegment == 'publikasi_ilmiah') : ?>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-primary" href="<?= base_url('publikasi_ilmiah'); ?>">Publikasi Ilmiah <span class="sr-only">(current)</span></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('publikasi_ilmiah'); ?>">Publikasi Ilmiah</a>
                    </li>
                <?php endif; ?>
                <?php if ($uriSegment == 'galeri_foto') : ?>
                    <li class="nav-item active">
                        <a class="nav-link font-weight-bold text-primary" href="<?= base_url('galeri_foto'); ?>">Galeri Foto <span class="sr-only">(current)</span></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('galeri_foto'); ?>">Galeri Foto</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>