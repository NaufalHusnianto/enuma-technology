<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;
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
        $newsModel = new NewsModel();
        $news = $newsModel->find($id);

        if (!$news) {
            throw new PageNotFoundException('News not found');
        }

        return view('pages/admin/news/show', ['news' => $news, 'title' => 'News Detail']);
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
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/news', $imageName);
        } else {
            $imageName = null;
        }

        $content = $this->request->getVar('content');
        $updatedContent = $this->moveImagesFromTemp($content);

        $data = [
            'title' => $this->request->getVar('title'),
            'description' => $this->request->getVar('description'),
            'content' => $updatedContent,
            'image_url' => $imageName,
        ];

        if ($this->newsModel->save($data)) {
            return redirect()->to('/admin/news')->with('success', 'News created successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->newsModel->errors());
        }
    }

    // Upload gambar sementara ke session
    public function uploadToTemp()
    {
        $file = $this->request->getFile('upload');

        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/temp', $fileName);

            return $this->response->setJSON([
                'uploaded' => true,
                'url' => base_url('uploads/temp/' . $fileName),
            ]);
        }

        return $this->response->setJSON([
            'uploaded' => false,
            'error' => ['message' => 'Failed to upload image.'],
        ]);
    }

    // Fungsi untuk memindahkan gambar dari temp ke storage permanen
    private function moveImagesFromTemp($content)
    {
        preg_match_all('/src="([^"]*\/uploads\/temp\/[^"]*)"/', $content, $matches);
        $tempImages = $matches[1];
        $updatedContent = $content;

        foreach ($tempImages as $tempImage) {
            $tempPath = parse_url($tempImage, PHP_URL_PATH);
            $tempFile = FCPATH . ltrim($tempPath, '/');

            if (file_exists($tempFile)) {
                $newFileName = basename($tempFile);
                $newFilePath = FCPATH . 'uploads/news/' . $newFileName;

                if (rename($tempFile, $newFilePath)) {
                    $newUrl = base_url('uploads/news/' . $newFileName);
                    $updatedContent = str_replace($tempImage, $newUrl, $updatedContent);
                }
            }
        }

        return $updatedContent;
    }

    // Preview gambar sementara (untuk debugging atau tampilan CKEditor)
    public function previewTempImage()
    {
        $filePath = $this->request->getGet('path');
        $fileFullPath = FCPATH . ltrim($filePath, '/');

        if (file_exists($fileFullPath)) {
            return $this->response
                ->setHeader('Content-Type', mime_content_type($fileFullPath))
                ->setBody(file_get_contents($fileFullPath));
        }

        return $this->response->setStatusCode(404, 'Image not found');
    }

    // Hapus gambar sementara
    public function deleteTempImages()
    {
        $tempFolder = FCPATH . 'uploads/temp/';
        $files = glob($tempFolder . '*');

        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Temp images cleared']);
    }
}
