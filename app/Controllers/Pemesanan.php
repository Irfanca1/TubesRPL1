<?php

namespace App\Controllers;

use App\Models\MPemesanan;
use App\Models\MDetailPemesanan;
use App\Models\MPembayaran;
use App\Models\MMeja;
use App\Models\MMenu;

class Pemesanan extends BaseController
{
    protected
        $pemesananModel,
        $detailPemesananModel,
        $pembayaranModel,
        $mejaModel,
        $menuModel;

    public function __construct()
    {
        $this->pemesananModel       = new MPemesanan();
        $this->detailPemesananModel = new MDetailPemesanan();
        $this->pembayaranModel      = new MPembayaran();
        $this->mejaModel            = new MMeja();
        $this->menuModel            = new MMenu();
    }

    public function index()
    {
        if (is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $pemesanan = $this->pemesananModel->getPemesanan();
        $data = [
            'title' => 'Pemesanan',
            'pemesanan' => $pemesanan
        ];

        return view('pemesanan/v_pemesanan', $data);
    }

    public function detail_pemesanan($no_pemesanan)
    {
        if (is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $detailPemesanan = $this->detailPemesananModel->getDetailPemesanan($no_pemesanan);

        $data = [
            'title' => 'Detail Pemesanan',
            'detailPemesanan' => $detailPemesanan,
        ];

        if (empty($data['detailPemesanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("No pemesanan $no_pemesanan tidak ditemukan.");
        }
        return view('pemesanan/v_detail_pemesanan', $data);
    }
}
