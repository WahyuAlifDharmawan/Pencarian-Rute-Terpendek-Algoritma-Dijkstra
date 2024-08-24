<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TempatFasilitasumum extends Model
{
    protected $table = 'tempat_fasilitasumum';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_fu', 'latitude_fu', 'longitude_fu', 'kelurahan_fu', 'gambar_fu'];

    public function countAll()
    {
        return $this->countAllResults();
    }
}
