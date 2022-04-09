<!-- Footer -->
<footer id="footer" class="mt-3" style="background-color: #00599F;">
    <div class="footer-top">
        <div class="container text-white p-5">
            <div class="row justify-content-center slide">
                <!-- Navigasi Bawah (Kiri) -->
                <div class="col-md-4 col-sm-12 pt-3">
                    <p class="text-warning"><strong>Navigasi</strong></p>
                    <a href="<?= base_url('home'); ?>" class="text-white">Home</a> <br>
                    <a href="<?= base_url('berita/index'); ?>" class="text-white">Berita</a> <br>
                    <a href="<?= base_url('pengajar'); ?>" class="text-white">Pengajar</a> <br>
                    <a href="<?= base_url('prestasi'); ?>" class="text-white">Prestasi</a> <br>
                    <a href="<?= base_url('galeri_foto'); ?>" class="text-white">Galeri Foto</a> <br>
                </div>
                <!-- Alamat Sekolah (Tengah) -->
                <div class="col-md-4 col-sm-12 pt-3">
                    <p class="text-warning"><strong>Alamat</strong></p>
                    <p>Jl. Cimanuk NO.309 A <br> Kec. Tarogong Kidul Kab. Garut <br> Prov. Jawa Barat, Indonesia</p>
                </div>
                <!-- Sosial Media SIJA & Sekolah (Kanan) -->
                <div class="col-md-4 col-sm-12 pt-3">
                    <p class="text-warning"><strong>Sosial Media</strong></p>
                    <a href="https://www.instagram.com/sija.smea/" class="p-1" target="_blank"><i class="fab fa-fw fa-instagram text-white"></i></a>
                    <a href="https://www.youtube.com/channel/UCWqTHZxswHc813_p8tQcKBA" class="p-1" target="_blank"><i class="fab fa-fw fa-youtube text-white"></i></a>
                    <a href="https://www.smknegeri1garut.sch.id/" class="p-1" target="_blank"><i class="fas fa-fw fa-globe text-white"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer-bottom" style="background-color: #00467c;">
        <div class="container text-white text-center">
            <div class="row">
                <div class="col p-1">
                    <p>2021 © Sistem Informatika Jaringan dan Aplikasi SMK Negeri 1 Garut
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Library !importantè -->
<script src="<?= base_url(); ?>assets/frontend/vendor/jquery/jquery-3.5.1.slim.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/vendor/jquery/jquery-3.5.1.min.js"></script>

<script src="<?= base_url(); ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>assets/frontend/vendor/owl-carousel/owl.carousel.min.js"></script>

<script src="<?= base_url() ?>assets/frontend/vendor/baguettebox/baguetteBox.min.js"></script>

<!-- DataTables scripts -->
<script type="text/javascript" src="<?= base_url(); ?>assets/backend/vendor/datatables/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        var owlBanner = $(".owl-carousel");
        owlBanner.owlCarousel({
            margin: 10,
            loop: true,
            autoplay: true,
            center: true,
            autoplayTimeout: 4000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                578: {
                    items: 3,
                    nav: false
                }
            }
        });
    });
</script>

<script>
    baguetteBox.run('.grid-gallery', {
        animation: 'slideIn'
    });
</script>

<!-- DataTables Script -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</body>

</html>