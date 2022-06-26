<?php

namespace App\Models;

use CodeIgniter\Model;

class MMeja extends Model
{
    protected $table            = 'meja';
    protected $primaryKey       = 'no_meja';
    protected $allowedFields    = ['status_meja'];

    public function getMeja($no_meja = false)
    {
        if ($no_meja == false) {
            return $this->findAll();
        }

        return $this->where(['no_meja' => $no_meja])->first();
    }

    // Update status_meja
    public function updateStatusMeja($no_meja, $status)
    {
        $query = "UPDATE meje SET
                  status_meja = '$status'
                  WHERE no_meja = $no_meja;";
        return $this->db->query($query);
    }

    public function getStatusMeja($status_meja)
    {
        $builder = $this->selectCount('status_meja');
        $query   = $builder->getWhere(['status_meja' => $status_meja])->getResultArray()[0]['status_meja'];

        return $query;
    }

    public function getMejaKosong()
    {
        $builder = $this->select('no_meja');
        $query   = $builder->getWhere(['status_meja' => "Kosong"])->getResultArray();

        return $query;
    }
}
