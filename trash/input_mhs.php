<html>

<head>
    <title>FORM DATA MAHASISWA</title>

<body>
    <center>
        <h2>Form Data Mahasiswa</h2>

        <form method="POST" action="<?php echo site_url('home/simpanmhs') ?>">
            <input type="text" name="nim_mhs" placeholder="nim">
            <br>
            <input type="text" name="nama_mhs" placeholder="nama">
            <br>
            <select name="jurusan_mhs">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Arsitektur">Teknik Arsitektur</option>
            </select>
            <br>
            <input type="text" name="alamat_mhs" placeholder="alamat">
            <br><br>
            <button type="submit">Simpan Data</button>
            &nbsp;
            <a href="<?php echo site_url('home/viewmhs') ?>">Lihat Data</a>

        </form>


    </center>

</body>
</head>

</html>