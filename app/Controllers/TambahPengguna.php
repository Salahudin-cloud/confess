<?php

namespace App\Controllers;

use App\Models\TambahPenggunaModel;

class TambahPengguna extends BaseController
{

    protected $tambahPenggunaModel;

    // inisoalisasi model
    public function __construct()
    {
        $this->tambahPenggunaModel = new TambahPenggunaModel();
    }

    // render tampilan
    public function index()
    {
        // check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        return view('backend/admin/tambah_pengguna');
    }

    // process menambah kan pengguna 
    public function processMenambahPengguna()
    {
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'username' => 'required|max_length[10]',
                'password' => 'required',
                'role' => 'required'
            ],
            [   // Errors
                'username' => [
                    'required' => 'Jangan biarkan form username kosong',
                ],
                'password' => [
                    'required' => 'Jangan biarkan form password kosong',
                ],
                'role' => [
                    'required' => 'Jangan biarkan form role kosong',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $data = $validate->getErrors();
            return redirect()->to('tambah_pengguna')->withInput()->with('errors', $data);
        }

        // mendapatkan data
        $username = esc($this->request->getPost('username'));
        $password = esc($this->request->getPost('password'));
        $role = esc($this->request->getPost('role'));


        // process insert data 
        $this->tambahPenggunaModel->insertPengguna(
            $username,
            $password,
            $role
        );

        // return redirect ke halaman daftar pengguna
        return redirect()->to('mengelola_pengguna');
    }
}
