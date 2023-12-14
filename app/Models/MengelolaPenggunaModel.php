<?php


namespace App\Models;

use CodeIgniter\Model;

class MengelolaPenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $allowedFields = ['username', 'password', 'role', 'status_pengguna'];

    public function getAllPengguna()
    {
        return $this->db->table('pengguna')->get()->getResult();
    }

    // delete pengguna by id 
    public function deletePenggunaById($id)
    {
        return $this->db->table('pengguna')
            ->where('pengguna_id', $id)
            ->delete();
    }
}
