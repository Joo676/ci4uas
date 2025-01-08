<?php

namespace App\Controllers;

class Perpustakaan extends BaseController
{
    public function __construct()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // Redirect ke halaman login jika belum login
            header('Location: /login');
            exit;
        }
    }

    public function dashboard()
    {
        return view('perpustakaan/dashboard'); // Menampilkan halaman dashboard
    }
}
