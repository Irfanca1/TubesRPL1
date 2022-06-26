<?php

namespace App\Models;

use CodeIgniter\Model;

class MMenu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'kode_menu';
    protected $allowedFields = ['kode_menu', 'nama', 'slug', 'harga', 'stok', 'gambar', 'deskripsi'];

    // Method untuk memperoleh menu terbaru
    public function getMenuTerbaru()
    {
        $query = "SELECT kode_menu, nama, harga, gambar
        FROM menu
        WHERE kode_menu = (
          SELECT MAX(kode_menu) 
          FROM menu
        );
      ";
        $builder = $this->db->query($query);

        $query = $builder->getResultArray()[0];

        return $query;
    }

    public function getJumlahMenu()
    {
        $builder = $this->selectCount('kode_menu');
        $query   = $builder->getWhere(['stok >' => 0])->getResultArray()[0]['kode_menu'];

        return $query;
    }
}
