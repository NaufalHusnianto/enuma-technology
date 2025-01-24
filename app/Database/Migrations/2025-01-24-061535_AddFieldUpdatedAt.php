<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldUpdatedAt extends Migration
{
    public function up()
    {
        // Menambahkan kolom 'updated_at' pada tabel 'contacts'
        $this->forge->addColumn('contacts', [
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('contacts', 'updated_at');
    }
}
