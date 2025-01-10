<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';

    // Kolom yang bisa dimasukkan atau diubah
    protected $allowedFields = ['kode_buku', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'jumlah_eksemplar'];

    // Aktifkan fitur timestamp jika diperlukan
    protected $useTimestamps = false; // Atau true jika tabel punya kolom created_at/updated_at
}
