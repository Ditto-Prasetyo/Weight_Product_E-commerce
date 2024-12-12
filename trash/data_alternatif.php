<center>
    <div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Alternatif</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_alternatif as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->C1; ?></td>
                            <td><?= $row->C2; ?></td>
                            <td><?= $row->C3; ?></td>
                            <td><?= $row->C4; ?></td>
                            <td style="width: 25%;">
                                <!-- Tombol Hapus -->
                                <a href="<?= site_url('home/hapus_alternatif/' . $row->id_alternatif); ?>" class="btn btn-danger">Hapus</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row->id_alternatif; ?>">
                                    Edit Data
                                </button>
                                <!-- Modal Edit untuk setiap baris data -->
                                <div class="modal fade" id="editModal<?= $row->id_alternatif; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id_alternatif; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel<?= $row->id_alternatif; ?>">Edit Data Alternatif Usaha anda</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form untuk mengedit jenis usaha -->
                                                <form action="<?= site_url('home/edit_data_alternatif'); ?>" method="post">
                                                    <div class="form-group">
                                                        <label for="C1">Nilai C1</label>
                                                        <!-- Mengisi value input dengan data dari PHP -->
                                                        <input type="text" class="form-control" id="C1" name="C1" value="<?= $row->C1; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C2">Nilai C2 </label>
                                                        <!-- Mengisi value input dengan data dari PHP -->
                                                        <input type="text" class="form-control" id="C2" name="C2" value="<?= $row->C2; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C3">Nilai C3 </label>
                                                        <!-- Mengisi value input dengan data dari PHP -->
                                                        <input type="text" class="form-control" id="C3" name="C3" value="<?= $row->C3; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C4">Nilai C4 </label>
                                                        <!-- Mengisi value input dengan data dari PHP -->
                                                        <input type="text" class="form-control" id="C4" name="C4" value="<?= $row->C4; ?>" required>
                                                    </div>
                                                    <input type="hidden" name="id_umkm" value="<?= $row->id_alternatif; ?>">
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

            <!-- Tombol Tambah Data dengan Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Tambah Data Alternatif UMKM</button>
        </div>
    </div>
</center>

<!-- Modal Tambah Data (AdminLTE) -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif Anda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('home/tambah_umkm_proses'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="C1">Kriteria 1 (C1)</label>
                        <input type="number" step="any" class="form-control" id="C1" name="C1" required>
                    </div>
                    <div class="form-group">
                        <label for="C2">Kriteria 2 (C2)</label>
                        <input type="number" step="any" class="form-control" id="C2" name="C2" required>
                    </div>
                    <div class="form-group">
                        <label for="C3">Kriteria 3 (C3)</label>
                        <input type="number" step="any" class="form-control" id="C3" name="C3" required>
                    </div>
                    <div class="form-group">
                        <label for="C4">Kriteria 3 (C4)</label>
                        <input type="number" step="any" class="form-control" id="C4" name="C4" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>