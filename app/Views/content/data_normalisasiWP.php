<center>
    <div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Nilai S (WP)</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Alternatif</th>
                        <th>Nama UMKM</th>
                        <th>Kriteria 1 (C1)</th>
                        <th>Kriteria 2 (C2)</th>
                        <th>Kriteria 3 (C3)</th>
                        <th>Kriteria 3 (C4)</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($WP_data_normalisasi as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['id_alternatif']; ?></td>
                            <td><?= $row['nama_umkm']; ?></td>
                            <td><?= $row['nilai_alternatif']['C1']; ?></td>
                            <td><?= $row['nilai_alternatif']['C2']; ?></td>
                            <td><?= $row['nilai_alternatif']['C3']; ?></td>
                            <td><?= $row['nilai_alternatif']['C4']; ?></td>
                            <td><?= $row['nilai_wp']; ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</center>