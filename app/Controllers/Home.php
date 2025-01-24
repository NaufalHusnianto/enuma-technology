<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/main_page');
    }

    public function newsPage()
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $newsModel->findAll(),
            'title' => 'News'
        ];

        return view('pages/news_page', $data);
    }
}
