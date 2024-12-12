<center>
<div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Nilai V (WP)</h3>
        </div>
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Alternatif</th>
                    <th>Nama UMKM</th>
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($WP_data_preferensi as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['id_alternatif']; ?></td>
                        <td><?= $row['nama_umkm']; ?></td>
                        <td><?= $row['nilai_preferensi']; ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
</div>
</center>