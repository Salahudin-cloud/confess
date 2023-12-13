<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'password', 'role'];

    // funciton menambhakn pengguna baru ke database 
    public function regis($username, $password, $role)
    {
        return $this->db->table('pengguna')->insert([
            'username' => $username,
            'password' => md5($password),
            'role' => $role
        ]);
    }


    // function ceek apakah username sudah ad a
    public function isUsernameExist($username)
    {
        $query =  $this->db->table('pengguna')->where('username', $username)->get()->getRow();

        // jika ada username 
        if (!empty($query)) {
            return true;
        }

        // jika tidak ada
        return false;
    }
}
