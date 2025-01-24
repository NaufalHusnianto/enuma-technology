<?php 

namespace App\Controllers;

use App\Models\PortfolioModel;
use Config\Services;

class Portfolio extends BaseController
{
    protected $portfolioModel;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioModel();
    }

    public function index()
    {
        $portfolios = $this->portfolioModel
            ->orderBy('id', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Portfolio List',
            'portfolios' => $portfolios,
        ];

        return view('pages/admin/portfolios/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Portfolio',
        ];

        return view('pages/admin/portfolios/create', $data);
    }

    public function store()
    {
        $validation = Services::validation();

        $validation->setRules([
            'title' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]',
            'description' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/portfolios', $imageName);
        } else {
            $imageName = null;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->portfolioModel->save($data)) {
            return redirect()->to('/admin/portfolios')->with('success', 'Portfolio created successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->portfolioModel->errors());
        }
    }

    public function edit($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        $data = [
            'title' => 'Edit Portfolio',
            'portfolio' => $portfolio,
        ];
        return view('pages/admin/portfolio/edit', $data);
    }

    public function update($id)
    {
        $portfolio = $this->portfolioModel->find($id);
        if (!$portfolio) {
            return redirect()->to('/admin/portfolios')->with('error', 'Portfolio not found.');
        }

        $imageFile = $this->request->getFile('image');
        $imageName = $portfolio['image'];

        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $newImageName = $imageFile->getRandomName();
            $imageFile->move('uploads/portfolios', $newImageName);

            if (!empty($portfolio['image'])) {
                $oldImagePath = 'uploads/portfolios/' . $portfolio['image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = $newImageName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->portfolioModel->update($id, $data)) {
            return redirect()->to('/admin/portfolios')->with('success', 'Portfolio updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->portfolioModel->errors());
        }
    }

    public function delete($id)
    {
        $portfolio = $this->portfolioModel->find($id);

        if (!empty($portfolio['image'])) {
            $mainImagePath = WRITEPATH . '../public/uploads/portfolios/' . $portfolio['image'];
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
        }

        $this->portfolioModel->delete($id);
        return redirect()->to('/admin/portfolios')->with('success', 'Portfolio deleted successfully.');
    }
}
