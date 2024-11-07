<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\IssueModel as Issue;

class IssueController extends ResourceController
{
    protected $issue;

    public function __construct()
    {
        $this->issue = new Issue();
    }

    public function index()
    {
        $data = $this->issue->findAll();
        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal'),
            'status' => $this->request->getPost('status'),
        ];

        if ($this->issue->insert($data)) {
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

    public function show($id = null)
    {
        $data = $this->issue->getWhere(['id' => $id])->getResult();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan dengan id ' . $id);
        }
    }

    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        $data = [
            'judul' => $input['judul'],
            'deskripsi' => $input['deskripsi'],
            'tanggal' => $input['tanggal'],
            'status' => $input['status'],
        ];

        if ($this->issue->update($id, $data)) {
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
        $data = $this->issue->find($id);
        if ($data) {
            $this->issue->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil dihapus'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data dengan ID ' . $id . ' tidak ditemukan');
        }
    }
}
