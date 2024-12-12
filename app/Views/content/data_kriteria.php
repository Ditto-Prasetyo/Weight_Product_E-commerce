<style>
    .modal-body .form-group label {
        text-align: left !important;
    }
</style>

<center>
    <div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Kriteria</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Nama Bobot</th>
                        <th>Nilai Bobot</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_kriteria as $umkm) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $umkm->kode; ?></td>
                            <td><?= $umkm->nama; ?></td>
                            <td><?= $umkm->nama_bobot; ?></td>
                            <td><?= $umkm->nilai_bobot; ?></td>
                            <td>
                                <a href="<?= site_url('home/hapus_kriteria/' . $umkm->id_kriteria); ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                                <button type="button"
                                    class="btn btn-primary btn-sm"
                                    data-toggle="modal"
                                    data-target="#editModal<?= $umkm->id_kriteria; ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?= $umkm->id_kriteria; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $umkm->id_kriteria; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?= $umkm->id_kriteria; ?>">Edit Data Kriteria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= site_url('home/edit_data_kriteria'); ?>" method="post">
                                        <div class="modal-body">
                                            <!-- Form untuk mengedit jenis usaha -->
                                            <form action="<?= site_url('home/edit_data_kriteria'); ?>" method="post">
                                                <div class="form-group">
                                                    <label for="kode_kriteria" class="text-left">Kriteria Anda</label>
                                                    <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="<?= $umkm->kode_kriteria; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="text-left">Nama Kriteria</label>
                                                    <select class="form-control" name="nama">
                                                        <option value="<?= $umkm->kode_kriteria ?>"><?= $umkm->nama ?></option>
                                                        <?php foreach ($jenis as $row) { ?>
                                                            <option value="<?= $row->kode ?>"><?= $row->nama ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_bobot" class="text-left">Nama Bobot</label>
                                                    <input type="text" class="form-control" id="nama_bobot" name="nama_bobot" value="<?= $umkm->nama_bobot; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nilai_bobot" class="text-left">Nilai Bobot</label>
                                                    <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" value="<?= $umkm->nilai_bobot; ?>" required>
                                                </div>
                                                <input type="hidden" name="id_umkm" value="<?= $umkm->id_kriteria; ?>">
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-success btn-sm" style="margin-top: 15px;" data-toggle="modal" data-target="#tambahDataModal">
                <i class="fas fa-plus"></i> Tambah Data Kriteria
            </button>
        </div>
    </div>
</center>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('home/tambah_data_kriteria'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_kriteria">Kode Kriteria</label>
                        <input type="text" class="form-control" name="kode_kriteria" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <select class="form-control" name="nama" required>
                            <?php foreach ($jenis as $row) : ?>
                                <option value="<?= $row->kode; ?>"><?= $row->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_bobot">Nama Bobot</label>
                        <input type="text" class="form-control" name="nama_bobot" required>
                    </div>
                    <div class="form-group">
                        <label for="nilai_bobot">Nilai Bobot</label>
                        <input type="number" step="0.01" class="form-control" name="nilai_bobot" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>