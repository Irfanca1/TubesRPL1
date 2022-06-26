<?php

namespace App\Controllers;

use App\Models\MMenu;

class Menu extends BaseController
{
    protected $menuModel;
    public function __construct()
    {
        $this->menuModel = new MMenu();
    }

    public function index()
    {
        if (is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $currentPage = $this->request->getVar('page_menu') ? $this->request->getVar('page_menu') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $menu = $this->menuModel->search($keyword);
        } else {
            $menu = $this->menuModel;
        }

        $data = [
            'title' => 'Menu',
            'menu'  => $menu->paginate(3, 'menu'),
            'pager' => $this->menuModel->pager,
            'currentPage' => $currentPage
        ];

        return view('menu/index', $data);
    }

    public function detail($slug)
    {
        if (is_kasir()) {
            return redirect()->to(base_url(previous_url()));
        }

        $data = [
            'title' => 'Menu',
            'menu' => $this->menuModel->getMenu($slug)
        ];

        if (empty($data['menu'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama menu' . $slug . 'tidak ditemukan');
        }
        return view('menu/detail', $data);
    }
}
