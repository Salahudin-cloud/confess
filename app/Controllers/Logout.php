<?php

namespace App\Controllers;

class Logout extends BaseController
{

    public function index()
    {
        $session = \Config\Services::session();


        // destro session and cookie
        $session->destroy();


        return redirect()->to('/');
    }
}
