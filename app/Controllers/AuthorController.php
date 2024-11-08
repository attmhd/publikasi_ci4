<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Session\Session;
use App\Models\AuthorView;
use App\Models\AuthorModel;

class AuthorController extends ResourceController
{
    protected $authorView;
    protected $authorModel;
    protected $session;

    public function __construct()
    {
        $this->authorView = new AuthorView();
        $this->authorModel = new AuthorModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'authors' => $this->authorView->paginate(5),
            'pager' => $this->authorView->pager,
        ];

        return view('author/index', $data);
    }

    public function add_form()
    {
        return view('author/add_form');
    }

    public function edit($id = null)
    {
        $data = $this->authorModel->find($id);
        if (!$data) {
            return $this->fail('Author not found', 404);
        }

        return view('author/edit_form', ["author" => $data]);
        // return $this->respond($data);
    }

    public function create()
    {
        $data = [
            "id_author" => $this->request->getPost('id_author'),
            "nama_author" => $this->request->getPost('nama_author'),
            "prodi" => $this->request->getPost('prodi'),
            "email" => $this->request->getPost('email'),
            'afiliasi' => $this->request->getPost('afiliasi'),
            "wa" => $this->request->getPost('wa'),
        ];

        if ($this->authorModel->insert($data)) {
            $this->session->setFlashdata('success', 'Author berhasil ditambahkan');
            return redirect()->to('/dashboard/author');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->authorModel->errors());
        }
    }

    public function update($id = null)
    {
        $data = [
            "id_author" => $this->request->getPost('id_author'),
            "nama_author" => $this->request->getPost('nama_author'),
            "prodi" => $this->request->getPost('prodi'),
            "email" => $this->request->getPost('email'),
            'afiliasi' => $this->request->getPost('afiliasi'),
            "wa" => $this->request->getPost('wa'),
        ];

        if ($this->authorModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Author berhasil ditambahkan');
            return redirect()->to('/dashboard/author');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->authorModel->errors());
        }
    }

    public function delete($id = null)
    {
        $data = $this->authorModel->find($id);
        if (!$data) {
            return $this->failNotFound('Author not found');
        }

        $this->authorModel->delete($id);

        $this->session->setFlashdata('success', 'Author deleted successfully.');

        return redirect()->to('/dashboard/author');

      
    }
}
