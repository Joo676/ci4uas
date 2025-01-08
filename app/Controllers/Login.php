<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController
{
    public function index()
    {
        return view('perpustakaan/login'); // Menampilkan halaman login
    }

    public function authenticate()
    {
        $session = session();

        // Dummy login check (ganti dengan autentikasi dari database)
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === '12345') {
            // Set session login
            $session->set('isLoggedIn', true);
            return redirect()->to('/dashboard');
        } else {
            // Jika login gagal
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Menghapus semua data session
        return redirect()->to('/login');
    }
}

