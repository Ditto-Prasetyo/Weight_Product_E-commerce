<center>
    <div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Jenis Usaha</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Jenis Usaha</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($jenis_usaha as $usaha) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $usaha->nama_usaha; ?></td>
                            <td>
                                <!-- Tombol Hapus -->
                                <a href="<?= site_url('home/hapus_ju/' . $usaha->id_usaha); ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                                <!-- Tombol Edit -->
                                <button type="button" 
                                        class="btn btn-primary" 
                                        data-toggle="modal" 
                                        data-target="#editModal<?= $usaha->id_usaha; ?>">
                                    Edit Data
                                </button>

                                <!-- Modal Edit Data -->
                                <div class="modal fade" 
                                     id="editModal<?= $usaha->id_usaha; ?>" 
                                     tabindex="-1" 
                                     role="dialog" 
                                     aria-labelledby="editModalLabel<?= $usaha->id_usaha; ?>" 
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Jenis Usaha UMKM</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= site_url('home/edit_umkm_usaha'); ?>" method="post">
                                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                                    <div class="form-group">
                                                        <label for="nama_jenis_<?= $usaha->id_usaha; ?>">Nama Jenis Usaha</label>
                                                        <input type="text" 
                                                               class="form-control" 
                                                               id="nama_jenis_<?= $usaha->id_usaha; ?>" 
                                                               name="nama_jenis" 
                                                               value="<?= $usaha->nama_usaha; ?>" 
                                                               required>
                                                    </div>
                                                    <input type="hidden" name="id_jenis" value="<?= $usaha->id_usaha; ?>">
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

            <!-- Tombol Tambah Data -->
            <button type="button" class="btn btn-success btn-sm" style="margin-top: 15px;" data-toggle="modal" data-target="#tambahDataModal">
            <i class="fas fa-plus"></i> Tambah Data Jenis E-Commerce
            </button>
        </div>
    </div>
</center>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Usaha UMKM</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('home/tambah_umkm_usaha'); ?>" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usaha">Nama Jenis Usaha</label>
                        <input type="text" class="form-control" name="nama_usaha" required>
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
