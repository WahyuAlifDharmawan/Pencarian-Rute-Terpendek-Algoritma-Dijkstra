<?php

namespace App\Controllers\User;

use App\Models\M_Perbatasan;
use CodeIgniter\Controller;
use App\Models\M_TempatIbadah;
use App\Models\M_TempatFasilitasumum;

class CariRute extends Controller
{
    public function index()
    {
        // Mengambil data tempat ibadah
        $tempatIbadahModel = new M_TempatIbadah();
        $data['tempatIbadah'] = $tempatIbadahModel->findAll();

        // Mengambil data fasilitas umum
        $tempatFasilitasumumModel = new M_TempatFasilitasumum();
        $data['umum'] = $tempatFasilitasumumModel->findAll();

        // Mengambil data perbatasan
        $titikPerbatasanModel = new M_Perbatasan();
        $data['perbatasan'] = $titikPerbatasanModel->findAll();

        // Mengambil data type unik dari tempat ibadah
        $data['types'] = $tempatIbadahModel->getUniqueTypes();

        return view('user/cari_rute', $data); // Mengirim data tempat ibadah, fasilitas umum, dan perbatasan ke view
    }
}
