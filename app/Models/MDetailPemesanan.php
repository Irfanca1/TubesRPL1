<?php

namespace App\Models;

use CodeIgniter\Model;

class MDetailPemesanan extends Model
{
    protected $table      = 'detail_pemesanan';
    protected $allowedFields = ['no_pemesanan', 'no_pembayaran', 'kode_menu', 'kuantitas', 'subtotal'];

    public function getMenuTerlaris()
    {
        $firstDay = date('Y-m-d', strtotime("monday -1 week"));
        $lastDay = date('Y-m-d', strtotime("sunday this week"));

        $query = "SELECT a.kode_menu, a.nama, a.harga, a.gambar, SUM(ab.kuantitas) AS 'jumlah_terjual'
      FROM menu a
      INNER JOIN detail_pemesanan ab USING(kode_menu)
      INNER JOIN pembayaran b USING(no_pembayaran)
      WHERE b.tanggal_pembayaran BETWEEN '" . $firstDay . "' AND '" . $lastDay . "'
      GROUP BY ab.kode_menu
      ORDER BY SUM(ab.kuantitas) DESC
      LIMIT 1;
    ";

        $builder = $this->db->query($query);
        if (array_key_exists(0, $builder->getResultArray())) {
            $query = $builder->getResultArray()[0];
            return $query;
        }

        return;
    }
}
