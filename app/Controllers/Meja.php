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
}
