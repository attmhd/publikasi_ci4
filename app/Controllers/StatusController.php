<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StatusModel;

class StatusController extends ResourceController
{

    protected $model;
    protected $session;

    public function __construct()
    {
        $this->model = new StatusModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $status = $this->model->orderBy('id_status', 'ASC')->paginate(5);
        $data = [
            'status' => $status,
            'pager' => $this->model->pager,
            'flash_message' => $this->session->getFlashdata('message'),
        ];

        return view('status/index', $data);
    }

    public function add_form()
    {
        return view('status/add_form');
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_status' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'nama_status' => $this->request->getPost('nama_status'),
        ];

        if ($this->model->insert($data)) {
            $this->session->setFlashdata('message', 'Status created successfully.');
            // return $this->respondCreated($data);
            return redirect()->to('/dashboard/status');
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
            'nama_status' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'nama_status' => $this->request->getPost('nama_status'),
        ];

        if ($this->model->update($id, $data)) {
            $this->session->setFlashdata('message', 'Status updated successfully.');
            // return $this->respondUpdated($data);
            return redirect()->to('/dashboard/status');
        }
    }

    public function delete($id = null)
    {
        $status = $this->model->find($id);
        if (!$status) {
            return $this->failNotFound('Status not found');
        }

        if ($this->model->delete($id)) {
            $this->session->setFlashdata('message', 'Status deleted successfully.');
            // return $this->respondDeleted($status);
            return redirect()->to('/dashboard/status');
        }
    }
}
