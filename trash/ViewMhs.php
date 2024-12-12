<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<center>
    <h3>Daftar Mahasiswa</h3>
    <table style="width:60%">
        <thread>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jurusan</th>
                <th>Alamat</th>
            </tr>
        </thread>
        <tbody>
            <?php $no = 0;
            foreach ($dataMhs as $row):
                $no++ ?>
                <tr>
                    <th> <?= $no; ?></th>
                    <th> <?= $row->nim; ?></th>
                    <th> <?= $row->nama; ?></th>
                    <th> <?= $row->jurusan; ?></th>
                    <th> <?= $row->alamat; ?></th>
                    <td>
                        <a href="/home/formeditmhs/<?= $row->id_mhs; ?>">Edit</a>
                        <a href="/home/deletemhs/<?= $row->id_mhs; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</center>