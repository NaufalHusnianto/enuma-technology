<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientsModel extends Model
{
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name', 'image', 'link'];
    protected $validationRules = [
        'name' => 'required',
        'image' => 'required',
        'link' => 'required',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Name is required',
        ],
        'image' => [
            'required' => 'Image is required',
        ],
        'link' => [
            'required' => 'Link is required',
        ],
    ];
}