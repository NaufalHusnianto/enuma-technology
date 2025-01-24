<?php

namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\NewsModel;

class Home extends BaseController
{
    protected $clientsModel;

    function __construct()
    {
        $this->clientsModel = new ClientsModel();
    }

    public function index(): string
    {       
        $clients = $this->clientsModel
            ->orderBy('created_at', 'ASC')
            ->findAll();

        $newsModel = new NewsModel();
        
        $data = [
            'clients' => $clients,
            'news' => $newsModel->orderBy('created_at', 'DESC')->limit(6)->findAll(),
        ];    
        return view('pages/main_page', $data);
    }

    public function newsPage()
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $newsModel->orderBy('created_at', 'DESC')->limit(6)->findAll(),
        ];

        return view('pages/news_page', $data);
    }

    public function detailNews($id)
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $newsModel->find($id),
        ];

        return view('pages/detail_news_page', $data);
    }
}
