<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class News extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'News List',
            'news' => $this->newsModel->findAll()
        ];

        return view('pages/admin/news/index', $data);
    }

    public function show($id)
    {
        $berita = $this->newsModel->find($id);

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('berita/show', ['berita' => $berita]);
    }

    public function create()
    {
        $data = [
            'title' => 'Create News'
        ];

        return view('pages/admin/news/create', $data);
    }

    public function store()
    {
        $validation = Services::validation();
        
        $validation->setRules([
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[5]',
            'content' => 'required|min_length[10]',
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $imageFile = $this->request->getFile('image');

        if ($imageFile && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/news', $imageName);
        } else {
            $imageName = null;
        }

        $newsModel = new NewsModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'content' => $this->request->getVar('content'),
            'image_url' => $imageName,
        ];

        if ($newsModel->save($data)) {
            return redirect()->to('/admin/news')->with('success', 'News created successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $newsModel->errors());
        }
    }
}
