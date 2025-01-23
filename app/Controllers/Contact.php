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

    public function delete($id)
    {
        $contactModel = new ContactModel();
        $contactModel->delete($id);
        return redirect()->to(base_url('admin/contacts'))->with('success', 'Message deleted successfully.');
    }
}
