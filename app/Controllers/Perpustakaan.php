<?php

namespace App\Controllers;

use App\Models\AnggotaModel; 

class Perpustakaan extends BaseController
{
    protected $AnggotaModel;

    public function __construct()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // Redirect ke halaman login jika belum login
            header('Location: /login');
            exit;
        }

        $this->AnggotaModel = new AnggotaModel();
    }

    public function dashboard()
    {
        
          // Load model
          $anggotaModel = new AnggotaModel();

          // Ambil jumlah total anggota
          $totalAnggota = $anggotaModel->countAllResults();

        //dummy stats
        $stats = [
            'anggota' => $totalAnggota,
            'buku' => 10,
            'peminjaman' => 3,
            'pengembalian' => 2,
        ];      

        $data = [
            'activeMenu' => 'dashboard', // Menandai menu aktif
            'stats' => $stats,
            'pageTitle' => 'Dashboard', 
            'content' => view('perpustakaan/dashboard-cnt', ['stats' => $stats]),
        ];
    
        return view('perpustakaan/dashboard', $data); // Menampilkan halaman dashboard
    }







     // Anggota

    public function anggota()
    {
         // Ambil data anggota dari model
        $anggota = $this->AnggotaModel->findAll();

        $content = view('perpustakaan/anggota', ['anggota' => $anggota]);

        // Data yang dikirim ke view
        $data = [
            'activeMenu' => 'anggota', // Menandai menu aktif
            'pageTitle' => 'Data Anggota',
            'content' => $content
            
            
        
        ];
        return view('perpustakaan/dashboard', $data);
    }
    
    public function tambahAnggotaForm()
    {
    $data = [
        'activeMenu' => 'anggota',
        'pageTitle' => 'Tambah Anggota',
        'content' => view('perpustakaan/tambahAnggota')
    ];
    return view('perpustakaan/dashboard', $data);
    }

    public function tambahAnggota()
    {
    if (!$this->validate([
        'nama' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama harus diisi.',
                'min_length' => 'Nama harus memiliki minimal 3 karakter.'
            ]
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi.'
            ]
        ],
        'nomor_telepon' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Nomor telepon harus diisi.',
                'numeric' => 'Nomor telepon harus berupa angka.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email harus valid.'
            ]
        ],
    ])) {
        // Jika validasi gagal
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }

    $id_anggota = strtoupper(random_string('alnum', 8)); 

    // Jika validasi berhasil
    $this->AnggotaModel->insert([
        'id_anggota' => $id_anggota,
        'nama' => $this->request->getVar('nama'),
        'alamat' => $this->request->getVar('alamat'),
        'nomor_telepon' => $this->request->getVar('nomor_telepon'),
        'email' => $this->request->getVar('email')
    ]);

    session()->setFlashdata('success', 'Anggota berhasil ditambahkan.');
    return redirect()->to('/dashboard/anggota');
    }


    public function editAnggota($id_anggota)
    {
        $anggota = $this->AnggotaModel->find($id_anggota); // Ambil data anggota berdasarkan ID
    
        if (!$anggota) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Anggota tidak ditemukan.');
        }
        
      

        $data = [
            'activeMenu' => 'anggota', // Menandai menu aktif
            'pageTitle' => 'Edit Anggota', 
            'anggota' => $anggota, // Data anggota yang akan diedit
            'content' => view('perpustakaan/tambahAnggota', ['anggota' => $anggota, 'editMode' => true]),
        ];
    
        return view('perpustakaan/dashboard', $data);
    }
    
    
   public function updateAnggota($id_anggota)
{
    if (!$this->validate([
        'nama' => [
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => 'Nama harus diisi.',
                'min_length' => 'Nama harus memiliki minimal 3 karakter.'
            ]
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat harus diisi.'
            ]
        ],
        'nomor_telepon' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Nomor telepon harus diisi.',
                'numeric' => 'Nomor telepon harus berupa angka.'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email harus valid.'
            ]
        ],
    ])) {
        // Jika validasi gagal
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }

    // Update data anggota
    $this->AnggotaModel->update($id_anggota, [
        'nama' => $this->request->getVar('nama'),
        'alamat' => $this->request->getVar('alamat'),
        'nomor_telepon' => $this->request->getVar('nomor_telepon'),
        'email' => $this->request->getVar('email'),
    ]);

    session()->setFlashdata('success', 'Data anggota berhasil diperbarui.');
    return redirect()->to('/dashboard/anggota');
}

    
    public function hapusAnggota($id_anggota)
    {
    // Mencari data anggota berdasarkan ID
    $anggota = $this->AnggotaModel->find($id_anggota);

    if (!$anggota) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Anggota tidak ditemukan.');
    }

    // Menghapus data anggota dari database
    $this->AnggotaModel->delete($id_anggota);

    session()->setFlashdata('success', 'Anggota berhasil dihapus.');
    return redirect()->to('/dashboard/anggota');
    }

        //

    
    
}
