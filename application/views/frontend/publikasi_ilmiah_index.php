<!-- Berita -->
<section id="berita">
    <div class="container">
        <!-- Judul Banner -->
        <div class="row my-3">
            <div class="col py-3 text-center">
                <h2 class="font-weight-bolder">Publikasi Ilmiah SIJ SMK Negeri 1 Garut</h2>
                <hr class="bg-warning m-auto rounded" style="height: 4px; width: 80px;">
            </div>
        </div>
        <!-- Daftar berita -->
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Nama Penulis</th>
                                <th>Tingkat Penulis</th>
                                <th>Waktu Publikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($publikasiIlmiahAll as $publikasiIlmiah) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $publikasiIlmiah['judul']; ?></td>
                                    <td><?= $publikasiIlmiah['nama_penulis']; ?></td>
                                    <td><?= $publikasiIlmiah['level_penulis']; ?></td>
                                    <td><?= date("d F Y H:i:s", strtotime($publikasiIlmiah['created_at'])); ?></td>
                                    <td><a href="<?= base_url('publikasi_ilmiah/detail_publikasi_ilmiah/') . $publikasiIlmiah['id']; ?>" class=" btn btn-sm btn-primary">Baca</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>