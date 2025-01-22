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

    public function edit()
    {
        $session = session();
        $model = new UserModel();
    
        $userId = $session->get('id');
        $user = $model->find($userId);
    
        if (!$user) {
            return redirect()->to('/admin')->with('error', 'User not found.');
        }
    
        $data = [
            'title' => 'Edit Profile',
            'user' => $user,
        ];
    
        return view('pages/admin/profile', $data);
    }
    
    public function update()
    {
        $session = session();
        $model = new UserModel();
    
        $userId = $session->get('id');
        $user = $model->find($userId);
    
        if (!$user) {
            return redirect()->to('/admin')->with('error', 'User not found.');
        }
    
        $rules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email',
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }
    
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];
    
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }
    
        if ($model->update($userId, $data)) {
            $session->set([
                'username' => $data['username'],
                'email' => $data['email'],
            ]);
    
            return redirect()->to('/admin')->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
    }
    
}
