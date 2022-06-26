<?php

namespace App\Models;

use CodeIgniter\Model;

class MPembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'no_pembayaran';
    protected $allowedFields = ['tanggal_pembayaran', 'total_harga', 'pajak', 'total_bayar', 'uang_bayar', 'uang_kembalian', 'status_pembayaran', 'nrp_kasir'];

    public function getJumlahPembayaran($status_pembayaran)
    {
        $builder = $this->selectCount('status_pembayaran');
        $query = $builder->getWhere(['status_pembayaran' => $status_pembayaran])->getResultArray()[0]['status_pembayaran'];

        return $query;
    }
}
