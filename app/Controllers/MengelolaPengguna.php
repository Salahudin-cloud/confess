<?php


namespace App\Controllers;

use App\Models\MengelolaPenggunaModel;

class MengelolaPengguna extends BaseController
{

    protected $mengelolaPenggunaModel;

    // inisialisasi model 
    public function __construct()
    {
        $this->mengelolaPenggunaModel = new MengelolaPenggunaModel();
    }

    public function index()
    {
        // check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        //query all pengguna 
        $data['users'] = $this->mengelolaPenggunaModel->getAllPengguna();
        //return render dengan data 
        return view('backend/admin/mengelola_pengguna', $data);
    }


    public function deletePengguna()
    {
        
    }
}
