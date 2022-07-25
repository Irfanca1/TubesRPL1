<?php

namespace App\Controllers;

use App\Models\MMeja;

class Meja extends BaseController
{
    protected $mejaModel;

    public function __construct()
    {
        $this->mejaModel = new MMeja();
    }

    public function create()
    {
        if (!is_pelayan()) {
            return redirect()->to(base_url(previous_url()));
        }

        $data = [
            'title' => 'Form Tambah Data Meja',
            'validation' => \Config\Services::validation()
        ];

        return view('meja/v_create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'meja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} meja harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('meja/create')->withInput();
        }

        $this->mejaModel->save([
            'meja' => $this->request->getVar('meja'),
            'status_meja' => 'Kosong'
        ]);

        session()->setFlashdata('pesan', 'Meja Berhasil Ditambahkan');

        return redirect()->to('/meja');
    }

    public function index()
    {
        if (is_koki()) {
            return redirect()->to(base_url(previous_url()));
        }

        $meja = $this->mejaModel->getMeja();
        $data = [
            'title' => 'Meja',
            'meja' => $meja,
        ];

        return view('meja/v_meja', $data);
    }

    public function delete($no_meja)
    {
        $meja = $this->mejaModel->find($no_meja);

        $this->mejaModel->delete($no_meja);
        session()->setFlashdata('pesan', 'Meja Berhasil dihapus');
        return redirect()->to('/meja');
    }
}
