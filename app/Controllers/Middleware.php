<?php

namespace App\Controllers;

class Perpustakaan extends BaseController
{
    public function index()
    {
        // Periksa apakah pengguna sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Memuat view dashboard
        return view('perpustakaan/index');
    }
}