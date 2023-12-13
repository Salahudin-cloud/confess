<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }


    public function index()
    {
        return view('login');
    }


    public function auth()
    {
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules([
            'username' => 'required|alpha_numeric',
            'password' => 'required'
        ]);

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $session->setFlashdata('error', 'failed');
            return redirect()->to('/');
        }

        // mendapatkan data 
        $username = esc($this->request->getPost('username'));
        $password = esc($this->request->getPost('password'));

        // validasi form input 
        //query pengguna berdasakan masukan form 
        $data = $this->loginModel->validateUser($username, $password);

        if (!empty($data)) {
            // set cookie 
            $session->set([
                "id" => $data->pengguna_id,
                "username" => $data->username,
                "password" => $data->password,
                "isLogin" => true
            ]);

            // cek role pengguna
            switch ($data->role) {
                case 'admin':
                    $session->set('role', 'admin');
                    return redirect()->to('/dashboard');
                    break;
                default:
                    $session->set('role', 'user');
                    return redirect()->to('/homepage');
                    break;
            }
        } else {
            $session->setFlashdata('error', 'invalid');
            return redirect()->to('/');
        }
    }





}
