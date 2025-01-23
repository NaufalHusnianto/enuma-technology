<?php 

namespace App\Controllers;

use App\Models\ClientsModel;

class Clients extends BaseController
{
    protected $clientModel;
    public function __construct()
    {
        $this->clientModel = new ClientsModel();
    }

    public function index()
    {
        $clients = $this->clientModel
            ->orderBy('id', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Clients List',
            'clients' => $clients,
        ];

        return view('pages/admin/clients/index', $data);
    }

    public function create()
    {
        $title = 'Create Client';
        return view('pages/admin/clients/create',$title);
    }

    public function store()
    {

        $validation = Services::validation();

        $validation->setRules([
            'name' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]',
            'link' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $imageFile = $this->request->getFile('image');
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/clients', $imageName);
        } else {
            $imageName = null;
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'link' => $this->request->getPost('link'),
            'image_url' => $imageName,
        ];

        if ($this->clientModel->save($data)) {
            return redirect()->to('/admin/clients')->with('success', 'News created successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->clientModel->errors());
        }
    }
}