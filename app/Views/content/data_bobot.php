<center>
    <div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Bobot</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Nilai Kriteria</th>
                        <th>Tipe Kriteria</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_bobot as $umkm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $umkm->kode; ?></td>
                            <td><?= $umkm->nama; ?></td>
                            <td><?= $umkm->nilai; ?></td>
                            <td><?= $umkm->tipe; ?></td>
                            <td>
                                <!-- Tombol hapus -->
                                <a href="<?= site_url('home/hapus_bobot/' . $umkm->kode); ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>

                                <!-- Tombol Edit -->
                                <button type="button" 
                                        class="btn btn-primary btn-sm" 
                                        data-toggle="modal" 
                                        data-target="#editModal<?= $umkm->kode; ?>">
                                    Edit Data
                                </button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $umkm->kode; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $umkm->kode; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?= $umkm->kode; ?>">Edit Data Bobot</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= site_url('home/edit_bobot'); ?>" method="post">
                                                    <input type="hidden" name="kode" value="<?= $umkm->kode; ?>">
                                                    <div class="form-group">
                                                        <label for="kode">Kode Kriteria</label>
                                                        <input type="text" class="form-control" name="kode" value="<?= $umkm->kode; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama">Nama Kriteria</label>
                                                        <input type="text" class="form-control" name="nama" value="<?= $umkm->nama; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nilai">Nilai Kriteria</label>
                                                        <input type="number" step="any" class="form-control" name="nilai" value="<?= $umkm->nilai; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipe">Tipe Kriteria</label>
                                                        <input type="text" class="form-control" name="tipe" value="<?= $umkm->tipe; ?>" required>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Tombol Tambah Data -->
            <button type="button" class="btn btn-success btn-sm" style="margin-top: 15px;" data-toggle="modal" data-target="#tambahDataModal"><i class="fas fa-plus"></i> Tambah Data Bobot</button>
        </div>
    </div>
</center>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Bobot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('home/tambah_bobot'); ?>" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" class="form-control" name="kode" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai Kriteria</label>
                        <input type="number" step="any" class="form-control" name="nilai" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Kriteria</label>
                        <input type="text" class="form-control" name="tipe" required>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
