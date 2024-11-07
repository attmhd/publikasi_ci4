<?php

namespace App\Controllers;

use App\Models\DetailArtikelModel;
use App\Models\AuthorModel;
use App\Models\ArtikelModel;
use CodeIgniter\RESTful\ResourceController;

class DetailartikelController extends ResourceController
{
    protected $detailartikelModel;
    protected $authorModel;
    protected $artikelModel;

    public function __construct()
    {
        $this->detailartikelModel = new DetailArtikelModel();
        $this->authorModel = new AuthorModel();
        $this->artikelModel = new ArtikelModel();
    }

    public function index()
    {
        $detailartikel = $this->detailartikelModel->orderBy('id', 'ASC')->paginate(5);
        if (!$detailartikel) {
            return $this->fail('Failed to order articles');
        }

        $data = [
            'detailartikel' => $detailartikel,
            'pager' => $this->detailartikelModel->pager,
        ];

        return view('detail_artikel/index', $data);
    }   

    public function add_form()
    {
        $data = [
            'author' => $this->authorModel->findAll(),
            'artikel' => $this->artikelModel->findAll(),
        ];

        // return $this->response->setJSON($data);
        return view('detail_artikel/add_form', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'detail_artikel' => $this->detailartikelModel->find($id),
            'author' => $this->authorModel->findAll(),
            'artikel' => $this->artikelModel->findAll(),
        ];
        if (!$data) {
            return $this->failNotFound('Article not found');
        }
        return view('detail_artikel/edit_form', $data);
        // return $this->response->setJSON($data);
    }

    public function create()
    {
        $data = [
            'id_artikel' => $this->request->getPost('id_artikel'),
            'id_author' => $this->request->getPost('id_author'),
            'penulis_ke' => $this->request->getPost('penulis_ke'),
        ];

        $this->detailartikelModel->insert($data);
        session()->setFlashdata('message', 'Detail artikel berhasil ditambahkan');
        return redirect()->to('/dashboard/detailartikel');
    }

    public function update($id = null)
    {
        $data = [
            'id_artikel' => $this->request->getPost('id_artikel'),
            'id_author' => $this->request->getPost('id_author'),
            'penulis_ke' => $this->request->getPost('penulis_ke'),
        ];

        $this->detailartikelModel->update($id, $data);
        session()->setFlashdata('message', 'Detail artikel berhasil diubah');
        return redirect()->to('/dashboard/detailartikel');
    }

    public function delete($id = null)
    {
        $data = $this->detailartikelModel->find($id);
        if (!$data) {
            return $this->failNotFound('Article not found');
        }

        $this->detailartikelModel->delete($id);
        session()->setFlashdata('message', 'Detail artikel berhasil dihapus');
        return redirect()->to('/dashboard/detailartikel');
    }
}