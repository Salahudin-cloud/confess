<?php


namespace App\Controllers;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        // check status login
        $session = session();
        if (!$session->get('isLogin')) {
            return redirect()->to('/');
        }
        return view('backend/admin/admin');
    }
}
