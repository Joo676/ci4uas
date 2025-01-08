<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = ['id_anggota', 'kode_buku', 'tanggal_pinjam', 'tanggal_kembali', 'status', 'denda'];

    protected $useTimestamps = true;
}
