<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\BukuModel; 

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
        $this->BukuModel = new BukuModel();
    }

    public function dashboard()
    {
        
          // Load model
          $anggotaModel = new AnggotaModel();
          $bukuModel = new BukuModel();

          // Ambil jumlah total anggota
          $totalAnggota = $anggotaModel->countAllResults();
          $totalBuku = $bukuModel->countAllResults();

        //dummy stats
        $stats = [
            'anggota' => $totalAnggota,
            'buku' => $totalBuku,
            'peminjaman' => 'N/A',
            'pengembalian' => 'N/A',
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

    
    




    public function buku()
    {
        // Ambil data buku dari model
        $buku = $this->BukuModel->findAll();
        
        $data = [
            'activeMenu' => 'buku', // Menandai menu aktif
            'buku' => $buku,
            'pageTitle' => 'Manajemen Buku',
            'content' => view('perpustakaan/buku', ['buku' => $buku]), // Memasukkan data buku ke dalam view
            ];
        
        return view('perpustakaan/dashboard', $data); // Menampilkan halaman dashboard
    }
    

    public function tambahBukuForm()
{
    $data = [
        'activeMenu' => 'buku',
        'pageTitle' => 'Tambah Buku',
        'content' => view('perpustakaan/tambahBuku')
    ];
    return view('perpustakaan/dashboard', $data);
}



public function tambahBuku()
{

   

    if (!$this->validate([
        'kode_buku' => [
            'rules' => 'required|is_unique[buku.kode_buku]',
            'errors' => [
                'required' => 'Kode buku harus diisi.',
                'is_unique' => 'Kode buku sudah digunakan.'
            ]
        ],
        'judul' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Judul buku harus diisi.'
                // 'min_length' => 'Judul buku harus memiliki minimal 3 karakter.'
            ]
        ],
        'penulis' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Penulis harus diisi.'
            ]
        ],
        'penerbit' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Penerbit harus diisi.'
            ]
        ],
        'tahun_terbit' => [
            'rules' => 'required|numeric|exact_length[4]',
            'errors' => [
                'required' => 'Tahun terbit harus diisi.',
                'numeric' => 'Tahun terbit harus berupa angka.',
                'exact_length' => 'Tahun terbit harus terdiri dari 4 digit.'
            ]
        ],
        'jumlah_eksemplar' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Jumlah eksemplar harus diisi.',
                'numeric' => 'Jumlah eksemplar harus berupa angka.'
            ]
        ],
    ])) {
    // Jika validasi gagal
    session()->setFlashdata('error', $this->validator->listErrors());
    return redirect()->back()->withInput();
}

// var_dump($this->request->getPost()); // Data yang sudah divalidasi
// exit;


// Jika validasi berhasil
$this->BukuModel->insert([
    'kode_buku' => $this->request->getVar('kode_buku'),
    'judul' => $this->request->getVar('judul'),
    'penulis' => $this->request->getVar('penulis'),
    'penerbit' => $this->request->getVar('penerbit'),
    'tahun_terbit' => $this->request->getVar('tahun_terbit'),
    'jumlah_eksemplar' => $this->request->getVar('jumlah_eksemplar')
]);

session()->setFlashdata('success', 'Buku berhasil ditambahkan.');
return redirect()->to('/dashboard/buku');
}

public function editBuku($kode_buku)
{
    $buku = $this->BukuModel->find($kode_buku); // Ambil data buku berdasarkan kode_buku
    
    if (!$buku) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak ditemukan.');
    }

    $data = [
        'activeMenu' => 'buku', // Menandai menu aktif
        'pageTitle' => 'Edit Buku',
        'buku' => $buku, // Data buku yang akan diedit
        'content' => view('perpustakaan/tambahBuku', ['buku' => $buku, 'editMode' => true]),
    ];

    return view('perpustakaan/dashboard', $data);
}

public function updateBuku($kode_buku)
{
    // Validasi input
    if (!$this->validate([
        'kode_buku' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kode buku harus diisi.'
            ]
        ],
        'judul' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Judul buku harus diisi.',
                // 'min_length' => 'Judul buku harus memiliki minimal 3 karakter.'
            ]
        ],
        'penulis' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Penulis harus diisi.'
            ]
        ],
        'penerbit' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Penerbit harus diisi.'
            ]
        ],
        'tahun_terbit' => [
            'rules' => 'required|numeric|exact_length[4]',
            'errors' => [
                'required' => 'Tahun terbit harus diisi.',
                'numeric' => 'Tahun terbit harus berupa angka.',
                'exact_length' => 'Tahun terbit harus terdiri dari 4 digit.'
            ]
        ],
        'jumlah_eksemplar' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Jumlah eksemplar harus diisi.',
                'numeric' => 'Jumlah eksemplar harus berupa angka.'
            ]
        ],
    ])) {
        // Jika validasi gagal
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }

    // Update data buku
    $this->BukuModel->update($kode_buku, [
        'kode_buku' => $this->request->getVar('kode_buku'),
        'judul' => $this->request->getVar('judul'),
        'penulis' => $this->request->getVar('penulis'),
        'penerbit' => $this->request->getVar('penerbit'),
        'tahun_terbit' => $this->request->getVar('tahun_terbit'),
        'jumlah_eksemplar' => $this->request->getVar('jumlah_eksemplar')
    ]);

    session()->setFlashdata('success', 'Data buku berhasil diperbarui.');
    return redirect()->to('/dashboard/buku');
}

public function hapusBuku($kode_buku)
{
    // Mencari data buku berdasarkan kode_buku
    $buku = $this->BukuModel->find($kode_buku);

    if (!$buku) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak ditemukan.');
    }

    // Menghapus data buku dari database
    $this->BukuModel->delete($kode_buku);

    session()->setFlashdata('success', 'Buku berhasil dihapus.');
    return redirect()->to('/dashboard/buku');
}


}
