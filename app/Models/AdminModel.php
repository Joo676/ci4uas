<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    protected $allowedFields = ['username', 'password'];

    protected $useTimestamps = true;
}
