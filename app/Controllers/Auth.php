<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('pages/admin/login');
    }

    public function processLogin()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to('/admin');
            } else {
                return redirect()->to('/admin/login')->with('error', 'Invalid credentials.');
            }
        } else {
            return redirect()->to('/admin/login')->with('error', 'Invalid credentials.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
