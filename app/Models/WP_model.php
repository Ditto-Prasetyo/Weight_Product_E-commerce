<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Data_UMKM;

class WP_model extends Model
{
    function tampil_data_alternatif($id = null)
    {
        $query = $id != null
            ? $this->db->query("SELECT sa.*, du.nama_umkm FROM data_alternatif sa, data_umkm du WHERE sa.id_umkm = du.id_umkm AND sa.id_alternatif = '" . $id . "'")
            : $this->db->query("SELECT sa.*, du.nama_umkm FROM data_alternatif sa, data_umkm du WHERE sa.id_umkm = du.id_umkm");
        return $query->getResult();
    }

    public function Getnormalisasi()
    {
        $alternatif = $this->tampil_data_alternatif();
        $umkm = new Data_UMKM();
        $data_umkm = $umkm->tampil_data_bobot();
        $kode = array();

        foreach ($data_umkm as $kr) {
            $kode[$kr->kode_kriteria] = (float) $kr->nilai;
        }

        $normalisasi = [];

        foreach ($alternatif as $alter) {
            $WPvalue = 1;
            $AlterValue = [];


            foreach ($kode as $kode1 => $bobot) {
                $nilaiKriteria = $alter->$kode1;

                $WPvalue *= pow($nilaiKriteria, $bobot);

                $AlterValue[$kode1] = $nilaiKriteria;
            }

            $normalisasi[] = [
                'id_alternatif' => $alter->id_alternatif,
                'nama_umkm' => $alter->nama_umkm,
                'nilai_alternatif' => $AlterValue,
                'nilai_wp' => $WPvalue
            ];
        }
        return $normalisasi;
    }
    public function nilai_preferensi()
    {
        $normalisasi = $this->Getnormalisasi();

        $divider = 0;
        foreach ($normalisasi as $div) {
            $divider += $div['nilai_wp'];
        }

        $preferensi = [];
        foreach ($normalisasi as $norm) {
            $total = 0;

            $total = $norm['nilai_wp'] / $divider;

            $preferensi[] = [
                'id_alternatif' => $norm['id_alternatif'],
                'nama_umkm' => $norm['nama_umkm'],
                'nilai_preferensi' => $total
            ];
        }

        return $preferensi;
    }
}
