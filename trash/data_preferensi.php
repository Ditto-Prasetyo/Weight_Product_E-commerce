<center>
<div class="card" style="width: 80%;">
        <div class="card-header">
            <h3 class="card-title">Data Preferensi</h3>
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
                    <th>Skor</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_preferensi as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['kode_alternatif']; ?></td>
                        <td><?= $row['nama_umkm']; ?></td>
                        <td><?= $row['nilai_hasil']['C1']; ?></td>
                        <td><?= $row['nilai_hasil']['C2']; ?></td>
                        <td><?= $row['nilai_hasil']['C3']; ?></td>
                        <td><?= $row['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
</div>
</center>