<?php

namespace App\Models;

use CodeIgniter\Model;


class LoginModel extends Model
{

    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'password', 'role', 'status_pengguna'];


    //cek users password
    public function validateUser($username, $password)
    {
        $query = $this->db->table('pengguna')
            ->where('username', $username)
            ->where('password', md5($password))->get()->getRow();
        return $query;
    }
}
