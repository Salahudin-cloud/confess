<?php


namespace App\Controllers;

class DashboardPengguna extends BaseController
{
    public function index()
    {
        // check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        return view('backend/user/dashboard');
    }
}
