<?php

namespace App\Models;

use CodeIgniter\Model;

class PortfolioModel extends Model
{
    protected $table = 'Portfolios';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['title', 'description', 'image'];
    protected $validationRules = [
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|uploaded[image]|is_image[image]|max_size[image,2048]',
    ];

    protected $validationMessages = [
        'title' => [
            'required' => 'Title is required.',
        ],
        'description' => [
            'required' => 'Description is required.',
        ],
        'image' => [
            'uploaded' => 'Please upload an image.',
            'is_image' => 'Please upload a valid image file.',
            'max_size' => 'Image size should not exceed 10MB.',
        ],
    ];
}