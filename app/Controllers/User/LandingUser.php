<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;
use App\Models\M_TempatIbadah;
use App\Models\M_TempatFasilitasumum;

class LandingUser extends Controller
{
    public function index()
    {
        $tempatIbadahModel = new M_TempatIbadah(); // Ubah instansiasi model
        $tempatFasilitasumumModel = new M_TempatFasilitasumum();

        $data['jumlah_tempat_ibadah'] = $tempatIbadahModel->countAll(); // Mengambil jumlah tempat ibadah
        $data['jumlah_tempat_fasilitasumum'] = $tempatFasilitasumumModel->countAll();
        $data['gambar_tempat_ibadah'] = $tempatIbadahModel->getGambarTempatIbadah(); // Mengambil gambar-gambar dari database

        return view('user/landing_user', $data);
    }
    
}
