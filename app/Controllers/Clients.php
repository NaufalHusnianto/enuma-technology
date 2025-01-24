<?php 

namespace App\Controllers;

use App\Models\ClientsModel;
use Config\Services;

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
        $data = [
            'title' => 'Clients List',
        ];

        return view('pages/admin/clients/create',$data);
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
            'image' => $imageName,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->clientModel->save($data)) {
            return redirect()->to('/admin/clients')->with('success', 'News created successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->clientModel->errors());
        }
    }

    public function edit($id)
    {
        $client = $this->clientModel->find($id);
        $data = [
            'title' => 'Edit Client',
            'client' => $client,
        ];
        return view('pages/admin/clients/edit', $data);
    }

        public function update($id)
    {
        // Find the client by ID
        $client = $this->clientModel->find($id);
        if (!$client) {
            return redirect()->to('/admin/clients')->with('error', 'Client not found.');
        }

        $imageFile = $this->request->getFile('image');
        $imageName = $client['image']; // Retain the old image name by default

        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Generate a new random name for the uploaded image
            $newImageName = $imageFile->getRandomName();
            $imageFile->move('uploads/clients', $newImageName);

            // Delete the old image if it exists
            if (!empty($client['image'])) {
                $oldImagePath = 'uploads/clients/' . $client['image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the image name with the new one
            $imageName = $newImageName;
        }

        // Prepare the data for updating the client
        $data = [
            'name' => $this->request->getPost('name'),
            'link' => $this->request->getPost('link'),
            'image' => $imageName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update the client record in the database
        if ($this->clientModel->update($id, $data)) {
            return redirect()->to('/admin/clients')->with('success', 'Client updated successfully.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->clientModel->errors());
        }
    }


    public function delete($id)
    {
        $client = $this->clientModel->find($id);

        if (!empty($client['image'])) {
            $mainImagePath = WRITEPATH . '../public/uploads/clients/' . $client['image'];
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
        }

        $this->clientModel->delete($id);
        return redirect()->to('/admin/clients')->with('success', 'Client deleted successfully.');
    }
}