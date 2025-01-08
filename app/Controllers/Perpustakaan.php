<?php

namespace App\Controllers;

class Perpustakaan extends BaseController
{
    public function index()
    {
        // Memuat view dashboard
        return view('perpustakaan/login');
    }
    
}

