<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TempatIbadah extends Model
{
    protected $table = 'tempat_ibadah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_ti', 'latitude_ti', 'longitude_ti', 'kelurahan_ti', 'gambar_ti', 'type'];

    public function countAll()
    {
        return $this->countAllResults();
    }

    public function getGambarTempatIbadah()
    {
        return $this->select('gambar_ti')->findAll();
    }

    // New method to get unique types
    public function getUniqueTypes()
    {
        return $this->distinct()->select('type')->findAll();
    }
}
