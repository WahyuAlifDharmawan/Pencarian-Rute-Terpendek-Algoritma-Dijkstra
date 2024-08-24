<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\M_admin;

class Login extends Controller 
{
    public function index()
    {
        return view('admin/admin_form');
    }

    public function login_action()
    {
        $madmin = new M_admin();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $madmin->get_data($email, $password);

        if (!empty($cek) && isset($cek['email_admin']) && isset($cek['password_admin']) &&
            $cek['email_admin'] == $email && $cek['password_admin'] == $password)
        {
            session()->set('id', $cek['id']);
            session()->set('email_admin', $cek['email_admin']);
            session()->set('password_admin', $cek['password_admin']);
            return redirect()->to(base_url('admin/dashboard'));
        } else {
            session()->setFlashdata('gagal', 'Username / Password salah');
            return redirect()->to(base_url('admin/login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('admin/login'));
    }
}
