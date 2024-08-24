<?php

namespace App\Models;

use CodeIgniter\Model; 

class M_admin extends Model
{
    public function get_data($email, $password)
    {
        return $this->db->table('admin')
            ->where(array('email_admin' => $email, 'password_admin' => $password))
            ->get()->getRowArray();
    }
}
