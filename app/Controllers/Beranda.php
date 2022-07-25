<?php

namespace App\Controllers;

use App\Models\MMeja;
use App\Models\MMenu;
use App\Models\MPembayaran;
use App\Models\MPemesanan;
use App\Models\MDetailPemesanan;

class Beranda extends BaseController {
    protected
        $mejaModel,
        $pemesananModel,
        $pembayaranModel,
        $menuModel,
        $detailPemesananModel;

    public function __construct()
    {
        $this->mejaModel       = new MMeja();
        $this->pemesananModel  = new MPemesanan();
        $this->pembayaranModel = new MPembayaran();
        $this->menuModel       = new MMenu();
        $this->detailPemesananModel = new MDetailPemesanan;
    }

    public function index()
    {
        $mejaKosong      = $this->mejaModel->getStatusMeja('Kosong');
        $jumlahPemesanan = $this->pemesananModel->getJumlahPemesanan('Belum Selesai');
        $jumlahBelumBayar =  $this->pembayaranModel->getJumlahPembayaran('Belum Bayar');
        $menuTersedia = $this->menuModel->getJumlahMenu();
        $menuTerlaris = $this->detailPemesananModel->getMenuTerlaris();
        $menuTerbaru = $this->menuModel->getMenuTerbaru();

        $data = [
            'title'             => 'Beranda',
            'mejaKosong'        => $mejaKosong,
            'jumlahPemesanan'   => $jumlahPemesanan,
            'jumlahBelumBayar'  => $jumlahBelumBayar,
            'menuTersedia'      => $menuTersedia,
            'menuTerlaris'      => $menuTerlaris,
            'menuTerbaru'       => $menuTerbaru
        ];

        return view('beranda/v_beranda', $data);
    }
}
