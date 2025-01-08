<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';

    protected $allowedFields = ['id_anggota', 'nama', 'alamat', 'nomor_telepon', 'email'];

    protected $useTimestamps = true;
}
