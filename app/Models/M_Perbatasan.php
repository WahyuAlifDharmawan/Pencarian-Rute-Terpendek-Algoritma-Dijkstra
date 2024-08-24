<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Perbatasan extends Model
{
    protected $table = 'titik_perbatasan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_tp', 'latitude_tp', 'longitude_tp'];

    public function countAll()
    {
        return $this->countAllResults();
    }
}
