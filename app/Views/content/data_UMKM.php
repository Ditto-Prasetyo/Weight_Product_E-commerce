<center>
    <div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data UMKM</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Usaha UMKM</th>
                            <th>Nama Pimpinan</th>
                            <th>Alamat</th>
                            <th>Pusat Usaha</th>
                            <th>Jenis Usaha</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data_umkm as $umkm) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($umkm->nama_umkm); ?></td>
                                <td><?= htmlspecialchars($umkm->pimpinan); ?></td>
                                <td><?= htmlspecialchars($umkm->jalan) ?></td>
                                <td><?= htmlspecialchars($umkm->pusat) ?></td>
                                <td><?= htmlspecialchars($umkm->nama_usaha); ?></td>
                                <td>
                                    <a href="<?= site_url('home/hapus_umkm/' . $umkm->id_umkm); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal_<?= $umkm->id_umkm; ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Modal Edit Data -->
                                    <div class="modal fade" id="editModal_<?= $umkm->id_umkm; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data UMKM</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('home/edit_data_usaha'); ?>" method="post">
                                                        <input type="hidden" name="id_umkm" value="<?= $umkm->id_umkm; ?>">
                                                        <div class="form-group">
                                                            <label>Nama UMKM</label>
                                                            <input type="text" class="form-control" name="nama_umkm" value="<?= htmlspecialchars($umkm->nama_umkm); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Pimpinan</label>
                                                            <input type="text" class="form-control" name="pimpinan" value="<?= htmlspecialchars($umkm->pimpinan); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <input type="text" class="form-control" name="jalan" value="<?= htmlspecialchars($umkm->jalan); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pusat Usaha</label>
                                                            <input type="text" class="form-control" name="pusat" value="<?= htmlspecialchars($umkm->jalan); ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jenis Usaha</label>
                                                            <select class="form-control" name="jenis_usaha">
                                                                <option value="<?= $umkm->jenis_umkm; ?>"><?= $umkm->nama_usaha; ?></option>
                                                                <?php foreach ($jenis as $row) { ?>
                                                                    <option value="<?= $row->id_usaha; ?>"><?= $row->nama_usaha; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahDataModal">
            <i class="fas fa-plus"></i> Tambah Data E-Commerce
            </button>
        </div>
    </div>
</center>

<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data UMKM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('home/tambah_data_umkm'); ?>" method="post">
                    <div class="form-group">
                        <label>Nama UMKM</label>
                        <input type="text" class="form-control" name="nama_umkm" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pimpinan</label>
                        <input type="text" class="form-control" name="pimpinan" required>
                    </div>
                    <div class="form-group">
                        <label>Jalan</label>
                        <input type="text" class="form-control" name="jalan" required>
                    </div>
                    <div class="form-group">
                        <label>Pusat</label>
                        <input type="text" class="form-control" name="pusat" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Usaha</label>
                        <select class="form-control" name="jenis_umkm">
                            <option value="" disabled selected>Pilih Jenis Usaha</option>
                            <?php foreach ($jenis as $row) { ?>
                                <option value="<?= $row->id_usaha; ?>"><?= $row->nama_usaha; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
