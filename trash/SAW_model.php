<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Data_UMKM;

class SAW_model extends Model
{
    function tampil_data_alternatif()
    {
        $dataquery = $this->db->query("SELECT da.*, du.nama_umkm FROM data_alternatif da, data_umkm du WHERE da.id_umkm = du.id_umkm");
        return $dataquery->getResult();
    }

    public function checktype($id)
    {
        $query = $this->db->query("SELECT tipe FROM data_bobot WHERE kode='" . $id . "'");
        $data = $query->getRowArray();
        return $data['tipe'];
    }

    public function getNilaiKriteria($id)
    {
        $cond = $this->db->query("SELECT nilai FROM data_bobot WHERE kode = '" . $id . "'");
        $data = $cond->getRowArray();

        return $data['nilai'];
    }

    public function getMaxValue($kodeKriteria)
    {
        $query = $this->db->query("SELECT MAX($kodeKriteria) as max_value FROM data_alternatif");
        $result = $query->getRow();
        return $result->max_value;
    }

    public function getMinValue($kodeKriteria)
    {
        $query = $this->db->query("SELECT MIN($kodeKriteria) as min_value FROM data_alternatif");
        $result = $query->getRow();
        return $result->min_value;
    }

    public function Getnormalisasi()
    {
        $alternatif = $this->tampil_data_alternatif();
        $umkm = new Data_UMKM();
        $data_umkm = $umkm->tampil_data_bobot();
        $kriteria = array();

        foreach ($data_umkm as $kr) {
            $kriteria[] = $kr->kode_kriteria;
        }

        $normalisasi = [];

        foreach ($alternatif as $alt) {
            $nilaiNormalisasi = [];
            foreach ($kriteria as $k) {
                $tipeKriteria = $this->checktype($k);

                if ($tipeKriteria == 'Benefit') {
                    $maxValue = $this->getMaxValue($k);
                    $nilaiNormalisasi[$k] = $alt->$k / $maxValue;
                } else {
                    $minValue = $this->getMinValue($k);
                    $nilaiNormalisasi[$k] = $minValue / $alt->$k;
                }
            }

            $normalisasi[] = [
                'kode_alternatif' => $alt->id_alternatif,
                'nama_umkm' => $alt->nama_umkm,
                'normalisasi' => $nilaiNormalisasi
            ];
        }

        return $normalisasi;
    }

    public function nilai_preferensi()
    {
        $normalisasi = $this->Getnormalisasi();
        $umkm = new Data_UMKM();
        $data_umkm = $umkm->tampil_data_bobot();
        $kriteria = array();

        foreach ($data_umkm as $kr) {
            $kriteria[] = $kr->kode_kriteria;
        }

        $hasil = [];

        foreach ($normalisasi as $norm) {
            $total = 0;
            
            foreach ($kriteria as $kr) {
                $nilai = $this->getNilaiKriteria($kr);

                $nilaihasil[$kr] = $norm['normalisasi'][$kr] * $nilai;
                $total += $nilaihasil[$kr] * $nilai;
            }

            $hasil[] = [
                'kode_alternatif' => $norm['kode_alternatif'],
                'nama_umkm' => $norm['nama_umkm'],
                'nilai_hasil' => $nilaihasil,
                'total' => $total
            ];
        }

        return $hasil;
    }
}
