<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();

        $data = [
            'title' => 'Admin Users',
            'users' => $users
        ];

        return view('pages/admin/users/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Admin User',
        ];

        return view('pages/admin/users/create', $data);
    }

    public function store()
    {
        $validation = Services::validation();
    
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $userModel = new UserModel();
    
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
    
        $userModel->insert($data);
    
        return redirect()->to(base_url('admin/admin-users'))->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        $data = [
            'title' => 'Edit Admin User',
            'user' => $user
        ];

        return view('pages/admin/users/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);
        
        if (!$user) {
            return redirect()->to(base_url('admin/admin-users'))->with('error', 'User not found.');
        }

        $validation =  Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email',
            'password' => 'permit_empty|min_length[6]',
        ]);
        
        if (!$validation->run($this->request->getPost())) {
            return redirect()->to(base_url("admin/admin-users/edit/$id"))
                             ->withInput()
                             ->with('errors', $validation->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to(base_url('admin/admin-users'))->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to(base_url('admin/admin-users'))->with('success', 'User deleted successfully.');
    }
    
}
