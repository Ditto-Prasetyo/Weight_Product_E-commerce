<?php

namespace App\Controllers;

use App\Models\Data_UMKM;
use App\Models\Mahasiswa_model;
use App\Models\SAW_model;
use App\Models\WP_model;

class Home extends BaseController
{
    // Fungsi untuk menampilkan halaman utama dengan data UMKM
    public function index(): string
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_umkm();

        $data2['data_umkm'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('dashboard/content', $data2); // Ganti konten di sini
        echo view('dashboard/footer');
        return 0;
    }

    // Fungsi untuk menampilkan dashboard
    public function dashboard()
    {
        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('dashboard/content'); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    // Fungsi untuk menampilkan data jenis usaha
    public function jenis_usaha()
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_jenis();

        $data1['jenis_usaha'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/jenis_usaha', $data1); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    // Fungsi untuk menampilkan data UMKM
    public function data_UMKM()
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_umkm();
        $jenis = $abc->tampil_data_jenis();

        $data2['data_umkm'] = $ju;
        $data2['jenis'] = $jenis;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_umkm', $data2); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    // Fungsi untuk menampilkan data kriteria
    public function data_kriteria()
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_bobot();
        $jenis = $abc->tampil_data_kriteria();

        $data3['data_kriteria'] = $ju;
        $data3['jenis'] = $jenis;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_kriteria', $data3); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    // Fungsi untuk menampilkan data bobot
    public function data_bobot()
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_kriteria();

        $data4['data_bobot'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_bobot', $data4); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    // Fungsi menampilkan SAW data
    public function data_alternatif()
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_alternatif();

        $data5['data_alternatif'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_alternatif', $data5); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    public function data_normalisasi()
    {
        $abc = new SAW_model();
        $ju = $abc->Getnormalisasi  ();

        $data6['data_normalisasi'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_normalisasi', $data6); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    public function data_preferensi()
    {
        $abc = new SAW_model();
        $ju = $abc->nilai_preferensi();
        $kr = $abc->getNilaiKriteria('C1');

        $data7['data_preferensi'] = $ju;
        $data7['kr'] = $kr;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_preferensi', $data7); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    // Fungsi menampilkan WP data
    public function data_WPalternatif()
    {
        $abc = new Data_UMKM();
        $ju = $abc->tampil_data_alternatif();
        $du = $abc->tampil_data_umkm();

        $data5['WP_data_alternatif'] = $ju;
        $data5['data_umkm'] = $du;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_WPalternatif', $data5); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    public function data_WPnormalisasi()
    {
        $abc = new WP_model();
        $ju = $abc->Getnormalisasi();

        $data6['WP_data_normalisasi'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_normalisasiWP', $data6); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    public function data_WPpreferensi()
    {
        $abc = new WP_model();
        $ju = $abc->nilai_preferensi();
        

        $data7['WP_data_preferensi'] = $ju;

        echo view('dashboard/header');
        echo view('dashboard/nav');
        echo view('content/data_preferensiWP', $data7); // Ganti konten di sini
        echo view('dashboard/footer');
    }

    public function tambah_umkm_proses()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data9 = [
            'id_umkm'           => $this->request->getPost('id_umkm'),
            'C1'           => $this->request->getPost('C1'),
            'C2'           => $this->request->getPost('C2'),
            'C3'           => $this->request->getPost('C3'),
            'C4'           => $this->request->getPost('C4'),
        ];

        // Simpan ke database
        $abc->data_alternatif($data9);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_WPalternatif'));
    }

    public function tambah_umkm_usaha()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data1 = [
            'nama_usaha'           => $this->request->getPost('nama_usaha'),
        ];

        // Simpan ke database
        $abc->jenis_usaha($data1);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/jenis_usaha'));
    }

    public function tambah_data_umkm()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data2 = [
            'nama_umkm'           => $this->request->getPost('nama_umkm'),
            'pimpinan'           => $this->request->getPost('pimpinan'),
            'jalan'           => $this->request->getPost('jalan'),
            'pusat'           => $this->request->getPost('pusat'),
            'jenis_umkm'           => $this->request->getPost('jenis_umkm'),
        ];

        // Simpan ke database
        $abc->data_umkm($data2);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_umkm'));
    }

    public function tambah_data_kriteria()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data3 = [
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'kode_kriteria' => $this->request->getPost('kode_kriteria'),
            'nama_bobot' => $this->request->getPost('nama_bobot'),
            'nilai_bobot' => $this->request->getPost('nilai_bobot'),
            
        ];

        // Simpan ke database
        $abc->jenis_usaha($data3);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_kriteria'));
    }

    public function tambah_data_bobot()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data4 = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'nilai' => $this->request->getPost('jalan'),
            'tipe' => $this->request->getPost('desa'),
            
        ];

        // Simpan ke database
        $abc->jenis_usaha($data4);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_bobot'));
    }

    public function edit_umkm_usaha()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data1 = [
            'nama_usaha' => $this->request->getPost('nama_jenis'),
        ];

        $wh = [
            'id_usaha' => $this->request->getPost("id_jenis")
        ];

        // Simpan ke database
        $abc->prosesEdit("jenis_usaha", $data1, $wh);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/jenis_usaha'));
    }
    
    public function edit_data_usaha()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data2 = [
            'nama_umkm' => $this->request->getPost('nama_umkm'),
            'pimpinan' => $this->request->getPost('pimpinan'),
            'jalan' => $this->request->getPost('jalan'),
            'pusat' => $this->request->getPost('pusat'),
            
        ];

        $wh2 = [
            'id_umkm' => $this->request->getPost("id_umkm")
        ];

        // Simpan ke database
        $abc->prosesEdit("data_umkm", $data2, $wh2);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_umkm'));
    }
    
    public function edit_data_kriteria()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data3 = [
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'kode_kriteria' => $this->request->getPost('kode_kriteria'),
            'nama_bobot' => $this->request->getPost('nama_bobot'),
            'nilai_bobot' => $this->request->getPost('nilai_bobot'),
            
        ];

        $wh3 = [
            'id_kriteria' => $this->request->getPost("id_kriteria")
        ];

        // Simpan ke database
        $abc->prosesEdit("data_kriteria", $data3, $wh3);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_kriteria'));
    }
    
    public function edit_bobot()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data4 = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'nilai' => $this->request->getPost('nilai'),
            'tipe' => $this->request->getPost('tipe'),
            
        ];

        $wh4 = [
            'kode' => $this->request->getPost("kode")
        ];

        // Simpan ke database
        $abc->prosesEdit("data_bobot", $data4, $wh4);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_bobot'));
        
    }

    public function edit_data_alternatif()
    {
        $abc = new Data_UMKM();

        // Ambil data dari form
        $data5 = [
            'id_umkm' => $this->request->getPost('id_umkm'),
            'C1' => $this->request->getPost('C1'),
            'C2' => $this->request->getPost('C2'),
            'C3' => $this->request->getPost('C3'),
            'C4' => $this->request->getPost('C4'),
            
            
        ];

        $wh5 = [
            'id_alternatif' => $this->request->getPost("id_alternatif")
        ];

        // Simpan ke database
        $abc->prosesEdit("data_alternatif", $data5, $wh5);

        // Redirect kembali ke halaman data alternatif
        return redirect()->to(site_url('home/data_WPalternatif'));
    }

    // Fungsi untuk menghapus data jenis usaha berdasarkan ID
    public function hapus_ju($id)
    {
        $abc = new Data_UMKM();
        $tabel = "jenis_usaha";
        $id_target = "id_usaha";

        $abc->hapus($id_target, $id, $tabel);

        return redirect()->to(site_url('home/jenis_usaha'));
    }

    // Fungsi untuk menghapus data UMKM berdasarkan ID
    public function hapus_umkm($id)
    {
        $abc = new Data_UMKM();
        $tabel = "data_umkm";
        $id_target = "id_umkm";

        $abc->hapus($id_target, $id, $tabel);

        return redirect()->to(site_url('home/data_umkm'));
    }

    // Fungsi untuk menghapus data bobot berdasarkan ID
    public function hapus_bobot($id)
    {
        $abc = new Data_UMKM();
        $tabel = "data_bobot";
        $id_target = "kode";

        $abc->hapus($id_target, $id, $tabel);

        return redirect()->to(site_url('home/data_bobot'));
    }

    // Fungsi untuk menghapus data kriteria berdasarkan ID
    public function hapus_kriteria($id)
    {
        $abc = new Data_UMKM();
        $tabel = "data_kriteria";
        $id_target = "id_kriteria";

        $abc->hapus($id_target, $id, $tabel);

        return redirect()->to(site_url('home/data_kriteria'));
    }

    // Fungsi untuk menambahkan data alternatif
    public function hapus_alternatif($id)
    {
        $abc = new Data_UMKM();
        $tabel = "data_alternatif";
        $id_target = "id_alternatif";

        $abc->hapus($id_target, $id, $tabel);

        return redirect()->to(site_url('home/data_WPalternatif'));
    }
    

    // Fungsi untuk menambah data baru ke tabel 'jenis_usaha'
    public function tambah_jenis_usaha()
    {
        $abc = new Data_UMKM();
        $data = [
            'nama_usaha' => $this->request->getPost('nama_usaha'),
            'jenis_usaha' => $this->request->getPost('jenis_usaha'),
        ];
        
        $abc->jenis_usaha($data);

        return redirect()->to(site_url('home/jenis_usaha'));
    }

    // Fungsi untuk menambah data baru ke tabel 'data_umkm'
    public function tambah_umkm()
    {
        $abc = new Data_UMKM();
        $data = [
            'nama_umkm' => $this->request->getPost('nama_umkm'),
            'pimpinan' => $this->request->getPost('pimpinan'),
            'jalan' => $this->request->getPost('jalan'),
            'pusat' => $this->request->getPost('pusat'),
        ];

        $abc->data_umkm($data);

        return redirect()->to(site_url('home/data_umkm'));
    }

    // Fungsi untuk menambah data baru ke tabel 'data_bobot'
    public function tambah_bobot()
    {
        $abc = new Data_UMKM();
        $data = [
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
            'nilai' => $this->request->getPost('nilai'),
            'tipe' => $this->request->getPost('tipe'),
        ];

        $abc->data_bobot($data);

        return redirect()->to(site_url('home/data_bobot'));
    }

    // Fungsi untuk menambah data baru ke tabel 'data_kriteria'
    public function tambah_kriteria()
    {
        $abc = new Data_UMKM();
        $data = [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'tipe_kriteria' => $this->request->getPost('tipe_kriteria'),
        ];

        $abc->data_kriteria($data);

        return redirect()->to(site_url('home/data_kriteria'));
    }
}
?>
