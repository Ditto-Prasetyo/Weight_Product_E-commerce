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
                        <th>Id E-Commerce</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($WP_data_alternatif as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row->id_umkm)?></td>
                            <td><?= htmlspecialchars($row->C1); ?></td>
                            <td><?= htmlspecialchars($row->C2); ?></td>
                            <td><?= htmlspecialchars($row->C3); ?></td>
                            <td><?= htmlspecialchars($row->C4); ?></td>
                            <td style="width: 25%;">
                                <!-- Tombol Hapus -->
                                <a href="<?= site_url('home/hapus_alternatif/' . $row->id_alternatif); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>

                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $row->id_alternatif; ?>">
                                    Edit Data
                                </button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?= $row->id_alternatif; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $row->id_alternatif; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Alternatif</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= site_url('home/edit_data_alternatif'); ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="id_umkm">E-Commerce</label>
                                                        <select class="form-control" name="id_umkm">
                                                            <option value="<?= $row->id_umkm; ?>">
                                                                <?= $row->nama_umkm; ?>
                                                            </option>
                                                            <?php foreach ($data_umkm as $mboh) { ?>
                                                                <option value="<?= $mboh->id_umkm; ?>"><?= $mboh->nama_umkm; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C1">Nilai C1</label>
                                                        <input type="number" step="any" class="form-control" id="C1" name="C1" value="<?= htmlspecialchars($row->C1); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C2">Nilai C2</label>
                                                        <input type="number" step="any" class="form-control" id="C2" name="C2" value="<?= htmlspecialchars($row->C2); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C3">Nilai C3</label>
                                                        <input type="number" step="any" class="form-control" id="C3" name="C3" value="<?= htmlspecialchars($row->C3); ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="C4">Nilai C4</label>
                                                        <input type="number" step="any" class="form-control" id="C4" name="C4" value="<?= htmlspecialchars($row->C4); ?>" required>
                                                    </div>
                                                    <input type="hidden" name="id_umkm" value="<?= $row->id_alternatif; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Tombol Tambah Data -->
            <button type="button" class="btn btn-success" style="margin-top: 15px;" data-toggle="modal" data-target="#tambahDataModal"><i class="fas fa-plus"></i> Tambah Data Alternatif E-Commerce</button>
        </div>
    </div>
</center>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('home/tambah_umkm_proses'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_umkm">Usaha E-Commerce</label>
                        <select class="form-control" name="id_umkm">
                            <option value="" disabled selected> Pilih E-Commerce</option>
                            <?php foreach ($data_umkm as $row) { ?>
                                <option value="<?= $row->id_umkm; ?>"><?= $row->nama_umkm; ?></option>
                            <?php } ?>
                        </select>
                    </div>
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
                        <label for="C4">Kriteria 4 (C4)</label>
                        <input type="number" step="any" class="form-control" id="C4" name="C4" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>