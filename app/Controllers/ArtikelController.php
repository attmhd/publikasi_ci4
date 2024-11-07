<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ArtikelModel;

class ArtikelController extends ResourceController
{
    protected $artikelModel;
    protected $session;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'artikel' => $this->artikelModel->paginate(5),
            'pager' => $this->artikelModel->pager,
            'flash_message' => $this->session->getFlashdata('message')
        ];

        return view('artikel/index', $data);
    }

    public function add_form()
    {
        $data = [
            'artikel' => $this->artikelModel->findAll(),
            'flash_message' => $this->session->getFlashdata('message')
        ];

        return view('artikel/add_form', $data);
    }

    public function edit($id = null)
    {
        $data = $this->artikelModel->find($id);
        if (!$data)
        {
            return $this->fail('Artikel not found', 404);
        }

        return view('artikel/edit_form', $data);

    }

    public function create()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_artikel' => 'required',
            'judul_artikel' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid)
        {
            $this->artikelModel->insert([
                'id_artikel' => $this->request->getVar('id_artikel'),
                'judul_artikel' => $this->request->getVar('judul_artikel'),
            ]);

            $this->session->setFlashdata('message', 'Artikel created successfully');
            return redirect()->to('/dashboard/artikel');
        }
        else
        {
            return $this->fail($validation->getErrors());
        }
    }

    public function update($id = null)
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'judul_artikel' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid)
        {
            $this->artikelModel->update($id, [
                'judul_artikel' => $this->request->getVar('judul_artikel'),
            ]);

            $this->session->setFlashdata('message', 'Artikel updated successfully');
            return redirect()->to('/dashboard/artikel');
        }
        else
        {
            return $this->fail($validation->getErrors());
        }
    }

    public function delete($id = null)
    {
        $data = $this->artikelModel->find($id);
        if (!$data)
        {
            return $this->fail('Artikel not found', 404);
        }

        $this->artikelModel->delete($id);

        $this->session->setFlashdata('message', 'Artikel deleted successfully');
        return redirect()->to('/dashboard/artikel');
    }
}
