<?php

namespace App\Controllers;

use App\Models\ClientsModel;
use App\Models\NewsModel;
use App\Models\PortfolioModel;

class Home extends BaseController
{
    protected $clientsModel;
    protected $portfolioModel;
    protected $displayNews;

    function __construct()
    {
        $this->clientsModel = new ClientsModel();
        $newsModel = new NewsModel();
        $this->portfolioModel = new PortfolioModel();
        $this->displayNews = $newsModel->orderBy('created_at', 'DESC')->limit(6)->findAll();
    }

    public function index(): string
    {       
        $clients = $this->clientsModel
            ->orderBy('created_at', 'ASC')
            ->findAll();
        
        $portfolios = $this->portfolioModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data = [
            'clients' => $clients,
            'news' => $this->displayNews,
            'portfolios' => $portfolios,
        ];    
        return view('pages/main_page', $data);
    }

    public function newsPage()
    {
        $newsModel = new NewsModel();

        $data = [
            'news' => $this->displayNews,
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

    public function policy()
    {
        return view('pages/policy_page');
    }

    public function about()
    {
        return view('pages/about_page');
    }

    public function service()
    {
        return view('pages/service_page');
    }
}
