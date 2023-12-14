<?php


namespace App\Models;

use CodeIgniter\Model;

class UpdatePenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'password', 'role', 'status_pengguna'];


    // get pengguna by id 
    public function getPenggunaById($id)
    {
        return $this->db->table('pengguna')->where(
            'pengguna_id',
            $id
        )->get()->getRow();
    }

    // update pengguna
    public function updatePengguna($id, $username, $password)
    {
        if (empty($password)) {
            // jika kosong hanya update username
            return $this->db->table('pengguna')
                ->where('pengguna_id', $id)->update([
                    'username' => $username,
                ]);
        }

        //jika password tidak kosong update kedua nya 
        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)->update([
                'username' => $username,
                'password' => md5($password)
            ]);
    }
}
