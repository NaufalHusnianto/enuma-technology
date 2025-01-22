<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

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
}
