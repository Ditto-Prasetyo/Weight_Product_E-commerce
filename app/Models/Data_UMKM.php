<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_UMKM extends Model
{
    protected $table1 = 'jenis_usaha';
    protected $table2 = 'data_umkm';
    protected $table3 = 'data_kriteria';
    protected $table4 = 'data_bobot';
    protected $table5 = 'data_alternatif';
    protected $table6 = 'data_normalisasi';

    // Fungsi untuk menambah data ke tabel 'jenis_usaha'
    function jenis_usaha($data1)
    {
        $this->db->table($this->table1)->insert($data1);
        return true;
    }

    // Fungsi untuk menambah data ke tabel 'data_umkm'
    function data_umkm($data2)
    {
        $this->db->table($this->table2)->insert($data2);
        return true;
    }

    // Fungsi untuk menambah data ke tabel 'data_kriteria'
    function data_kriteria($data3)
    {
        $this->db->table($this->table3)->insert($data3);
        return true;
    }

    // Fungsi untuk menambah data ke tabel 'data_bobot'
    function data_bobot($data4)
    {
        $this->db->table($this->table4)->insert($data4);
        return true;
    }

    function data_alternatif($data5)
    {
        $this->db->table($this->table5)->insert($data5);
        return true;
    }

    function tampil_data_alternatif($id = null)
    {
        $dataquery = $this->db->query("SELECT sa.*, du.nama_umkm, sa.C1, sa.C2, sa.C3, sa.C4
    FROM data_alternatif sa
    JOIN data_umkm du ON sa.id_umkm = du.id_umkm
    " . ($id != null ? "WHERE sa.id_alternatif = '$id'" : ""));
        return $dataquery->getResult();
    }

    // Fungsi untuk menampilkan semua data dari tabel 'jenis_usaha'
    function tampil_data_jenis($id = null)
    {
        $dataquery = $id != null
            ? $this->db->query("SELECT * FROM $this->table1 WHERE id_target = " . $id)
            : $this->db->query("SELECT * FROM $this->table1");
        return $dataquery->getResult();
    }

    // Fungsi untuk menampilkan semua data dari tabel 'data_umkm'
    function tampil_data_umkm()
    {
        $dataquery = $this->db->query("SELECT du.*, ju.nama_usaha FROM $this->table2 du, $this->table1 ju WHERE du.jenis_umkm = ju.id_usaha");
        return $dataquery->getResult();
    }

    // Fungsi untuk menampilkan semua data dari tabel 'data_kriteria'
    function tampil_data_kriteria()
    {
        $dataquery = $this->db->query("SELECT * FROM $this->table4");
        return $dataquery->getResult();
    }

    // Fungsi untuk menampilkan semua data dari tabel 'data_bobot'
    function tampil_data_bobot()
    {
        $dataquery = $this->db->query("SELECT dk.*, db.kode, db.nama, db.nilai FROM $this->table4 db, $this->table3 dk WHERE dk.kode_kriteria = db.kode");
        return $dataquery->getResult();
    }

    // Fungsi untuk proses update/edit data
    function prosesEdit($table, $data, $where)
    {
        $this->db->table($table)->update($data, $where);
        return true;
    }


    // Fungsi untuk menghapus data berdasarkan ID
    function hapus($id_target, $id, $table)
    {
        $dataquery = $this->db->query("DELETE FROM $table WHERE $id_target = ?", [$id]);
        return true;
    }

    public function hitung_normalisasi()
    {
        // Misal Anda sudah menyimpan nilai kriteria ke dalam database
        $query = $this->db->query("SELECT * FROM data_kriteria");
        $kriteria = $query->getResult();

        // Proses perhitungan normalisasi (contoh sederhana)
        foreach ($kriteria as $row) {
            $C1 = $row->nilai_C1 / max(array_column($kriteria, 'nilai_C1'));
            $C2 = $row->nilai_C2 / max(array_column($kriteria, 'nilai_C2'));
            $C3 = $row->nilai_C3 / min(array_column($kriteria, 'nilai_C3'));
            $C4 = $row->nilai_C4 / min(array_column($kriteria, 'nilai_C4'));

            $hasil[] = [
                'nama_umkm' => $row->nama_umkm,
                'C1' => $C1,
                'C2' => $C2,
                'C3' => $C3,
                'C4' => $C4
            ];
        }

        return $hasil;
    }

    // Fungsi untuk menghitung matriks normalisasi
    function normalisasi($data, $maxValues, $minValues, $isCost = false)
    {
        if ($isCost) {
            return $minValues / $data;
        } else {
            return $data / $maxValues;
        }
    }

    // Fungsi untuk menghitung nilai preferensi berdasarkan bobot
    function hitungPreferensi($normalisasi, $bobot)
    {
        $total = 0;
        foreach ($normalisasi as $key => $value) {
            $total += $value * $bobot[$key];
        }
        return $total;
    }
}
