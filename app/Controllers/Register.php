<?php

namespace App\Controllers;

use App\Models\RegisterModel;

class Register extends BaseController
{
    protected $registerModel;
    public function __construct()
    {
        $this->registerModel = new RegisterModel();
    }
    // render view 
    public function index()
    {
        return view('register');
    }

    // proccess melakukan register 
    public function proccessRegister()
    {
        $session = session();
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'username' => 'required|max_length[10]',
                'password' => 'required',
                'password_confirm' => 'required|matches[password]'
            ],
            [   // Errors
                'username' => [
                    'required' => 'Jangan biarkan form username kosong',
                ],
                'password' => [
                    'required' => 'Jangan biarkan form password kosong',
                ],
                'password_confirm' => [
                    'required' => 'Jangan biarkan form password kosong',
                    'matches' => 'Pastikan password dan konfrimasi password sama'
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 

            $data = $validate->getErrors();
            return redirect()->to('register')->withInput()->with('errors', $data);
        }

        // mendapatkan data 
        $username = esc($this->request->getPost('username'));
        $password = esc($this->request->getPost('password'));

        if ($this->registerModel->isUsernameExist($username)) {
            $session->setFlashdata('error', 'exist');
            return redirect()->to('register');
        } else {
            // melakukan insert 
            $this->registerModel->regis($username, $password, 'pengguna');
            return redirect()->to('/');
        }
    }
}
