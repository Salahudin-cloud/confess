<?php


namespace App\Controllers;

use App\Models\UpdatePenggunaModel;

class UpdatePengguna extends BaseController
{

    protected $updatePenggunaModel;

    // inisialisasi model 
    public function __construct()
    {
        $this->updatePenggunaModel = new UpdatePenggunaModel();
    }

    // render view 
    public function index($id)
    {
        // check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        // query pengguna by id 
        $data['user'] = $this->updatePenggunaModel->getPenggunaById($id);
        //return render        
        return view('backend/admin/update_pengguna', $data);
    }

    // update pengguna process 
    public function updatePenggunaProcess($id)
    {
        // menggunakan library validation 
        $validate = \Config\Services::validation();
        // set rule form 
        $validate->setRules(
            [
                'username' => 'required|max_length[10]',
            ],
            [   // Errors
                'username' => [
                    'required' => 'Jangan biarkan form username kosong',
                ],
            ]
        );

        // menjalankan rule 
        if (!$validate->withRequest($this->request)->run()) {
            // jika validasi gagal 
            $data = $validate->getErrors();
            return redirect()->to('update_pengguna/' . $id)->withInput()->with('errors', $data);
        }

        // mendapatkan data
        $username = esc($this->request->getPost('username'));
        $password = esc($this->request->getPost('password'));

        // melakukan update pengguna data 
        $this->updatePenggunaModel->updatePengguna($id, $username, $password);

        // redirect ke daftar pengguna
        return redirect()->to('mengelola_pengguna');
    }
}
