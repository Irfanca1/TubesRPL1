<?php

namespace App\Controllers;

use App\Models\MPembayaran;
use App\Models\MDetailPemesanan;

class Pelaporan extends BaseController
{

    protected
        $MPembayaran,
        $MDetailPemesanan,
        $mejaModel;

    public function __construct()
    {
        $this->MPembayaran = new MPembayaran();
        $this->MDetailPemesanan = new MDetailPemesanan();
    }

    public function index()
    {
        if (!is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $pelaporanHarian = $this->MDetailPemesanan->getLaporanHarian();
        $kuantitasTerjualHarian = $this->MDetailPemesanan->getKuantitasTerjualHarian();
        $pemasukanHarian = $this->MPembayaran->getPemasukanHarian();

        $pelaporanMingguan = $this->MDetailPemesanan->getLaporanMingguan();
        $kuantitasTerjualMingguan = $this->MDetailPemesanan->getKuantitasTerjualMingguan();
        $pemasukanMingguan = $this->MPembayaran->getPemasukanMingguan();

        $pelaporanBulanan = $this->MDetailPemesanan->getLaporanBulanan();
        $kuantitasTerjualBulanan = $this->MDetailPemesanan->getKuantitasTerjualBulanan();
        $pemasukanBulanan = $this->MPembayaran->getPemasukanBulanan();

        $pelaporanTahunan = $this->MDetailPemesanan->getLaporanTahunan();
        $kuantitasTerjualTahunan = $this->MDetailPemesanan->getKuantitasTerjualTahunan();
        $pemasukanTahunan = $this->MPembayaran->getPemasukanTahunan();

        $data = [
            'title' => 'Pelaporan',
            'pelaporanHarian' => $pelaporanHarian,
            'kuantitasTerjualHarian' => $kuantitasTerjualHarian,
            'pemasukanHarian' => $pemasukanHarian,
            'pelaporanMingguan' => $pelaporanMingguan,
            'kuantitasTerjualMingguan' => $kuantitasTerjualMingguan,
            'pemasukanMingguan' => $pemasukanMingguan,
            'pelaporanBulanan' => $pelaporanBulanan,
            'kuantitasTerjualBulanan' => $kuantitasTerjualBulanan,
            'pemasukanBulanan' => $pemasukanBulanan,
            'pelaporanTahunan' => $pelaporanTahunan,
            'kuantitasTerjualTahunan' => $kuantitasTerjualTahunan,
            'pemasukanTahunan' => $pemasukanTahunan,
        ];

        return view('pelaporan/v_pelaporan', $data);
    }
}
