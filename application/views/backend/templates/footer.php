</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Kemanan Jaringan Aplikasi SMK Negeri 1 Garut <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Logout" untukk mengakhiri sesi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>



<!-- SweetAlert Script -->
<?php if ($this->session->flashdata('flash') == 'tambah-berhasil') : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Ditambahkan'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'tambah-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data Gagal Ditambahkan'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'ubah-berhasil') : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Diubah'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'ubah-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data Gagal Diubah'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'hapus-berhasil') : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Data Berhasil Dihapus'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'hapus-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data Gagal Dihapus'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('flash') == 'ubah-password-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Password Saat Ini Yang Anda Masukan Salah.'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('flash') == 'ubah-email-dimiliki-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Email Yang Anda Masukan Sudah Digunakan.'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'ubah-email-invalid-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Email Yang Anda Masukan Tidak Valid.'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'ubah-password-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Password Saat Ini Yang Anda Masukan Salah.'
        });
    </script>
<?php endif; ?>

<!-- SweetAlert Script -->
<?php if ($this->session->flashdata('flash') == 'hapus-root-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data Gagal Dihapus, Tidak Bisa Menghapus Root!'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'hapus-sendiri-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data Gagal Dihapus, Tidak Bisa Menghapus Akun Yang Sedang Digunakan!'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'reset-password-berhasil') : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Password Pengguna Berhasil Direset Kembali Ke Password Default'
        });
    </script>
<?php elseif ($this->session->flashdata('flash') == 'reset-password-gagal') : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Password Pengguna Gagal'
        });
    </script>
<?php endif; ?>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- DataTables scripts -->
<script type="text/javascript" src="<?= base_url(); ?>assets/backend/vendor/datatables/datatables.min.js"></script>

<!-- Summernote scripts -->
<script src="<?= base_url(); ?>assets/backend/vendor/summernote/summernote-bs4.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>

<!-- Bootstrapselect script -->
<script src="<?= base_url(); ?>assets/backend/vendor/bootstrapselect/dist/js/bootstrap-select.min.js"></script>

<!-- Kartik Bootstrap Fileinput -->
<script src="<?= base_url(); ?>assets/backend/vendor/kartik-v-bootstrap-fileinput/js/fileinput.min.js"></script>

<!-- Summernote Script -->
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ],
            height: 500
        });
    });
</script>

<!-- DataTables Script -->
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>

<!-- Preview Image Modal Script -->
<script>
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    var index = $('#index').val();

    $("#uploadBtn").change(function() {
        readURL(this, 'photoShowId');
    });

    for (let i = 1; i <= index; i++) {
        $("#uploadBtn" + i).change(function() {
            readURL(this, 'photoShowId' + i);
        });
    }
</script>

<script>
    $(document).ready(function() {
        $("#input-b9").fileinput({
            showPreview: false,
            showUpload: false
        });
    });

    $(document).ready(function() {
        var indexp = $('#indexp').val();
        for (let i = 1; i <= indexp; i++) {
            $("#input-b" + i).fileinput({
                showPreview: false,
                showUpload: false
            });
        }
    });
</script>

</body>

</html>