<!-- Daftar Guru -->
<section id="guru">
    <div class="container">
        <!-- Judul Banner -->
        <div class="row my-3">
            <div class="col py-3 text-center">
                <h2 class="font-weight-bolder">Daftar Tenaga Pengajar SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <!-- Daftar Guru -->
        <div class="row justify-content-center">

            <?php foreach ($pengajarAll as $pengajar) : ?>
                <div class="col-12 col-md-4 col-lg-3 mb-3">
                    <div class="card">
                        <!-- Foto Guru -->
                        <?php if (is_null($pengajar['foto'])) : ?>
                            <img src="<?= base_url(); ?>assets/frontend/img/default-avatar.png" class="card-img-top">
                        <?php else : ?>
                            <img src="<?= base_url(); ?>uploads/profile/<?= $pengajar['foto']; ?>" class="card-img-top">
                        <?php endif; ?>
                        <!-- Nama Guru -->
                        <div class="card-body text-center">
                            <h5 class="font-weight-bold card-title pt-2">
                                <a type="button" href="#" data-toggle="modal" data-target="#modalDetailPengajar<?= $pengajar['id']; ?>" class="text-decoration-none"><?= $pengajar['nama']; ?></a>
                            </h5>
                            <!-- Mengajar sbg -->
                            <p class="card-text pb-2">Guru Mata Pelajaran <?= $pengajar['mata_pelajaran']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php foreach ($pengajarAll as $pengajar) : ?>
                <!-- Detail Guru (Modal) -->
                <div class="modal fade" id="modalDetailPengajar<?= $pengajar['id']; ?>" tabindex="-1" aria-labelledby="modalDetailPengajarLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <!-- Judul Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="modalDetailPengajarLabel">Detail
                                    Tenaga Pengajar</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- Deskripsi -->
                            <div class="modal-body">
                                <?php if (is_null($pengajar['foto'])) : ?>
                                    <div class="text-center mb-3">
                                        <img src="<?= base_url(); ?>assets/frontend/img/default-avatar.png" class="img-thumbnail rounded" width="280" height="350">
                                    </div>
                                <?php else : ?>
                                    <div class="text-center mb-3">
                                        <img src="<?= base_url(); ?>uploads/profile/<?= $pengajar['foto']; ?>" class="img-thumbnail rounded" width="280" height="350">
                                    </div>
                                <?php endif; ?>
                                <div class="row px-2 py-1">
                                    <div class="col-12 col-md-8">
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Nama</th>
                                                <td>: <?= $pengajar['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>: <?= $pengajar['jenis_kelamin']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mengajar</th>
                                                <td>: <?= $pengajar['mata_pelajaran']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>