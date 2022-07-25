<?php

namespace App\Controllers;

use App\Models\MPembayaran;
use App\Models\MDetailPemesanan;
use App\Models\MMeja;


class Pembayaran extends BaseController
{
    protected
        $mpembayaran,
        $mdetailpemesanan,
        $mmeja;

    public function __construct()
    {
        $this->mdetailpemesanan = new MDetailPemesanan();
        $this->mpembayaran = new MPembayaran();
        $this->mmeja = new MMeja();
    }

    public function index()
    {
        if (!is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $pembayaran = $this->mpembayaran->getPembayaran();

        $data = [
            'title' => 'Pembayaran',
            'pembayaran' => $pembayaran,
        ];

        return view('pembayaran/v_pembayaran', $data);
    }

    public function detail_pembayaran($no_pembayaran)
    {
        if (!is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $detailPemesanan = $this->mdetailpemesanan->getDetailPembayaran($no_pembayaran);

        $data = [
            'title' => 'Detail Pembayaran',
            'detailPemesanan' => $detailPemesanan,
        ];

        if (empty($data['detailPemesanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("No pembayaran $no_pembayaran tidak ditemukan.");
        }
        return view('pembayaran/v_detail_pembayaran', $data);
    }

    public function bayar($no_pembayaran, $no_meja)
    {
        if (!is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        if (!$this->validate([
            'uangBayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal pembayaran harus diisi!'
                ],
            ],
        ])) {
            return redirect()->to(base_url("/pembayaran/$no_pembayaran"))->withInput();
        };

        // Inisialisasi field
        $uang_bayar = $this->request->getVar('uangBayar');

        // Ambil total_bayar
        $total_bayar = $this->mpembayaran->getTotalBayar($no_pembayaran);

        // Hitung kembalian
        $uang_kembalian = $uang_bayar - $total_bayar;

        // Update pembayaran
        $this->mpembayaran->updateSudahBayar($no_pembayaran, $uang_bayar, $uang_kembalian);

        // Update meja baru menjadi 'Kosong'
        $this->mmeja->updateStatusMeja($no_meja, "Kosong");

        session()->setFlashdata('pesan', 'Melakukan pembayaran');

        return redirect()->to(base_url("/pembayaran/$no_pembayaran"));
    }

    public function belum_bayar($no_pembayaran)
    {
        if (!is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        // Update pembayaran
        $this->mpembayaran->updateBelumBayar($no_pembayaran);

        session()->setFlashdata('pesan', 'Mengubah status pembayaran');

        return redirect()->to(base_url("/pembayaran/$no_pembayaran"));
    }
}
