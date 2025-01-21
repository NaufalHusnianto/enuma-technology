<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $data = [
            [
                'username' => 'enuma',
                'email' => 'enuma@email.com',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $userModel->insertBatch($data);

        echo "Seeder berhasil dijalankan.\n";
    }
}
