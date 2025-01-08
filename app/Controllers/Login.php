<?php

namespace App\Controllers;

use App\Models\AdminModel; 

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
        $model = new AdminModel();

         // Ambil input dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $admin = $model->where('username', $username)->first();


        if ($admin && $password === $admin['password']){
            // Set session login
            $session->set('isLoggedIn', true);
            $session->set('username', $admin['username']);

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

