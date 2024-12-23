<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ArsipTerbitanModel;
use App\Models\IssueModel;
use App\Models\ArtikelModel;
use App\Models\ArsipTerbitanViewModel;

class ArsipTerbitanController extends ResourceController
{
    protected $model;
    protected $issue;
    protected $artikel;
    protected $session;
    protected $arsipTerbitanViewModel;

    public function __construct()
    {
        $this->model = new ArsipTerbitanModel();
        $this->issue = new IssueModel();
        $this->artikel = new ArtikelModel();
        $this->arsipTerbitanViewModel = new ArsipTerbitanViewModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = $this->arsipTerbitanViewModel->orderBy('id','ASC')->paginate(5);

        $data = [
            'data' => $data,
            'pager' => $this->arsipTerbitanViewModel->pager,
        ];

        return view('arsip_terbitan/index', $data);
        // return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'id_issue' => $this->request->getPost('id_issue'),
            'id_artikel' => $this->request->getPost('id_artikel'),
        ];

        if ($this->model->insert($data)) {
            $this->session->setFlashdata('message', 'Data berhasil disimpan');
            $response = [
                'status' => 201,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil disimpan'
                ]
            ];
            // return $this->respondCreated($response);
            return redirect()->to('/dashboard/arsipterbitan');
        }
    }

    public function add_form()
    {
        $data = [
            'issue' => $this->issue->findAll(),
            'artikel' => $this->artikel->findAll(),
        ];

        // return $this->respond($data);
        return view('arsip_terbitan/add_form', $data);
    }

    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        $data = [
            'id_issue' => $input['id_issue'],
            'id_artikel' => $input['id_artikel'],
        ];

        if ($this->model->update($id, $data)) {
            $this->session->setFlashdata('message', 'Data berhasil diupdate');
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil diupdate'
                ]
            ];
            // return $this->respond($response);
            return redirect()->to('/dashboard/arsipterbitan');
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            $this->model->delete($id);
            $this->session->setFlashdata('message', 'Data berhasil dihapus');
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil dihapus'
                ]
            ];
            // return $this->respondDeleted($response);
            return redirect()->to('/dashboard/arsipterbitan');
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
            return view('arsip_terbitan/edit_form', $data);
        } else {
            return $this->failNotFound('Data tidak ditemukan dengan id ' . $id);
        }
    }
}
