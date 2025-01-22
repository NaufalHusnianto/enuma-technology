<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class News extends BaseController
{
    public function newsPage()
    {
        return view('pages/news_page', ['title' => 'News']);
    }

    public function index()
    {
        return view('pages/admin/news/index', ['title' => 'News']);
    }
}
