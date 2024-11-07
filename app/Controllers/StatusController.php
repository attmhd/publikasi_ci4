<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StatusModel;

class StatusController extends ResourceController
{

    protected $model;

    public function __construct()
    {
        $this->model = new StatusModel();
    }

    public function index()
    {
        $status = $this->model->orderBy('id_status', 'ASC')->findAll();
        return $this->respond($status);

    }

    public function add_form()
    {
        return $this->respond("Halaman tambah status");
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_status' => 'required',
            'status' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'id_status' => $this->request->getPost('id_status'),
            'status' => $this->request->getPost('status'),
        ];

        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        }
    }

    public function show($id = null)
    {
        $status = $this->model->find($id);
        if (!$status) {
            return $this->failNotFound('Status not found');
        }

        return $this->respond($status);
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_status' => 'required',
            'status' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'id_status' => $this->request->getPost('id_status'),
            'status' => $this->request->getPost('status'),
        ];

        if ($this->model->update($id, $data)) {
            return $this->respondUpdated($data);
        }
    }

    public function delete($id = null)
    {
        $status = $this->model->find($id);
        if (!$status) {
            return $this->failNotFound('Status not found');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted($status);
        }
    }




}
