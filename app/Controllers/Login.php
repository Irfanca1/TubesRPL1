<?php

namespace App\Controllers;

use App\Models\MPegawai;

class Login extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new MPegawai();
    }

    public function index()
    {
        if (session()->get('nrp')) {
            return redirect()->to(base_url('/beranda'));
        }

        $data['title'] = 'Login | Resto Unikom';
        return view('login/v_login', $data);
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $pegawai  = $this->pegawaiModel->getPegawai($username);

        if ($pegawai) {
            if (($pegawai['username'] == $username) && $pegawai['password'] == $password) {
                $data = [
                    'nrp' => $pegawai['nrp'],
                    'nama' => $pegawai['nama'],
                    'jabatan' => $pegawai['jabatan'],
                    'username' => $pegawai['username'],
                    'logged_in' => true,
                ];
                session()->set($data);
                session()->setFlashdata('Pesan', 'Berhasil Login');

                return redirect()->to(base_url('/beranda'));
            } else {
                session()->setFlashdata('Pesan', 'Password Salah!');
                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('Pesan', 'Username Salah!');
            return redirect()->to(base_url('/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
