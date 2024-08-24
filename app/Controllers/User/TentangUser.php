<?php

namespace App\Controllers\User;

use CodeIgniter\Controller;

class TentangUser extends Controller
{
    public function index()
    {
        return view('user/tentang_user'); // Mengirim data tempat ibadah dan fasilitas umum ke view
    }
}
