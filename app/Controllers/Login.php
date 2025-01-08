<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('perpustakaan/login');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Contoh validasi login sederhana
        if ($username === 'admin' && $password === 'password') {
            session()->set('isLoggedIn', true);
            return redirect()->to('/perpustakaan');
        }

        return redirect()->back()->with('error', 'Login gagal!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}