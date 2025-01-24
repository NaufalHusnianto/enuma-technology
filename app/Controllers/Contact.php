<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function index()
    {
        $contactModel = new ContactModel();

        $contacts = $contactModel->findAll();

        $data = [
            'title' => 'Contact Message',
            'contacts' => $contacts
        ];

        return view('pages/admin/contacts/index', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => 'required|valid_email',
            'subject' => 'required',
            'message' => 'required',
        ])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Gagal mengirim pesan. Pastikan semua field sudah diisi dengan benar.'
            ]);
        }
    
        $contactModel = new ContactModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'subject' => $this->request->getVar('subject'),
            'message' => $this->request->getVar('message'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
    
        if ($contactModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Pesan berhasil dikirim.'
            ]);
        }
    
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Terjadi kesalahan saat mengirim pesan. Coba lagi nanti.'
        ]);
    }
    

    public function delete($id)
    {
        $contactModel = new ContactModel();
        $contactModel->delete($id);
        return redirect()->to(base_url('admin/contacts'))->with('success', 'Message deleted successfully.');
    }
}
