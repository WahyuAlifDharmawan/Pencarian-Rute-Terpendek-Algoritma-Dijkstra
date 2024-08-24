<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\M_TempatIbadah;
use App\Models\M_TempatFasilitasumum;
use App\Models\M_Perbatasan;

class Dashboard extends Controller
{
    public function index()
    {
        // Periksa apakah pengguna sudah login
        if (!session()->has('email_admin')) {
            return redirect()->to(base_url('admin/login')); // Jika belum login, arahkan ke halaman login
        }

        $tempatIbadahModel = new M_TempatIbadah(); // Ubah instansiasi model
        $tempatFasilitasumumModel = new M_TempatFasilitasumum();
        $PerbatasanModel = new M_Perbatasan();

        $data['jumlah_tempat_ibadah'] = $tempatIbadahModel->countAll(); // Mengambil jumlah tempat ibadah
        $data['jumlah_tempat_fasilitasumum'] = $tempatFasilitasumumModel->countAll();
        $data['jumlah_titik_perbatasan'] = $PerbatasanModel->countAll();


        return view('admin/admin_dashboard', $data); // Mengirim data ke view
    }
}
