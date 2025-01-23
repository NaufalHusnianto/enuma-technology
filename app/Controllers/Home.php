<?php

namespace App\Controllers;

use App\Models\ClientsModel;

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
        
        $data = [
            'clients' => $clients
        ];    
        return view('pages/main_page', $data);
    }
}
