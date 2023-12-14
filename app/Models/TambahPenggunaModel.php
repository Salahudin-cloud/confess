<?php


namespace App\Models;

use CodeIgniter\Model;

class TambahPenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'password', 'role'];

    // menambahkan pengguna
    public function insertPengguna(
        $username,
        $password,
        $role
    ) {
        return $this->db->table('pengguna')->insert([
            'username' => $username,
            'password' => md5($password), // encrypted password dengan md5 
            'role' => $role
        ]);
    }
}
