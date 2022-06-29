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

    public function savePembayaran($tanggal)
    {
        $data = [
            // 'tanggal_pembayaran' => $tanggal,
            'nrp_kasir' => session()->get('nrp'),
        ];
        return $this->save($data);
    }

    // Update pembayaran
    public function updatePembayaran($no_pembayaran, $total_harga, $pajak, $total_bayar, $tanggal = false)
    {
        $data = [  //update makanya pake no_pembayaran
            'no_pembayaran' => $no_pembayaran,
            'total_harga' => $total_harga,
            'pajak' => $pajak,
            'total_bayar' => $total_bayar,
            'nrp_kasir' => session()->get('nrp'),
        ];

        if ($tanggal != false) {
            $data['tanggal_pembayaran'] = $tanggal;
        }

        return $this->save($data);
    }

    // Delete Pembayaran
    public function deletePembayaran($no_pembayaran)
    {
        return $this->delete($no_pembayaran);
    }
}
