<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ArsipTerbitanModel;
use App\Models\IssueModel;
use App\Models\ArtikelModel;

class ArsipTerbitanController extends ResourceController
{
    protected $model;
    protected $issue;
    protected $artikel;
    protected $session;

    public function __construct()
    {
        $this->model = new ArsipTerbitanModel();
        $this->issue = new IssueModel();
        $this->artikel = new ArtikelModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = $this->model->orderBy('id','ASC')->paginate(5);

        $data = [
            'data' => $data,
            'pager' => $this->model->pager,
        ];

        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'id_issue' => $this->request->getPost('id_issue'),
            'id_artikel' => $this->request->getPost('id_artikel'),
        ];

        if ($this->model->insert($data)) {
            $this->session->setFlashdata('success', 'Data berhasil disimpan');
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil disimpan'
                ]
            ];
            return $this->respondCreated($response);
        }
    }

    public function add_form()
    {
        $data = [
            'issue' => $this->issue->findAll(),
            'artikel' => $this->artikel->findAll(),
        ];

        return $this->respond($data);
    }

    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        $data = [
            'id_issue' => $input['id_issue'],
            'id_artikel' => $input['id_artikel'],
        ];

        if ($this->model->update($id, $data)) {
            $this->session->setFlashdata('success', 'Data berhasil diupdate');
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil diupdate'
                ]
            ];
            return $this->respond($response);
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            $this->session->setFlashdata('success', 'Data berhasil dihapus');
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan dengan id ' . $id);
        }
    }

    public function edit($id = null)
    {
        $data = [
            'data' => $this->model->find($id),
            'issue' => $this->issue->findAll(),
            'artikel' => $this->artikel->findAll(),
        ];
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan dengan id ' . $id);
        }
    }
}
