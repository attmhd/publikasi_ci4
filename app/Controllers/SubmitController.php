<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SubmitModel;
use App\Models\ArtikelModel;
use App\Models\EditorModel;
use App\Models\IssueModel;
use App\Models\StatusModel;


class SubmitController extends ResourceController
{
    protected $submitModel;
    protected $artikelModel;
    protected $editorModel;
    protected $issueModel;
    protected $statusModel;

    public function __construct()
    {
        $this->submitModel = new SubmitModel();
        $this->artikelModel = new ArtikelModel();
        $this->editorModel = new EditorModel();
        $this->issueModel = new IssueModel();
        $this->statusModel = new StatusModel();
    }

    public function index()
    {
        $data = [
            'submit' => $this->submitModel->orderBy('id_submit', 'ASC')->paginate(5),
            'pager' => $this->submitModel->pager,
        ];

        return $this->respond($data);
    }

    public function add_form()
    {
        $data = [
            'artikel' => $this->artikelModel->findAll(),
            'editor' => $this->editorModel->findAll(),
            'issue' => $this->issueModel->findAll(),
            'status' => $this->statusModel->findAll(),
        ];

        return $this->respond($data);
    }

    public function edit_form($id = null)
    {
        $submit = $this->submitModel->find($id);
        if (!$submit) {
            return $this->failNotFound('Submit not found');
        }

        $data = [
            'submit' => $submit,
            'artikel' => $this->artikelModel->findAll(),
            'editor' => $this->editorModel->findAll(),
            'issue' => $this->issueModel->findAll(),
            'status' => $this->statusModel->findAll(),
        ];

        return $this->respond($data);
    }

    public function create()
    {
        $data = [
            'id_artikel' => $this->request->getPost('id_artikel'),
            'id_editor' => $this->request->getPost('id_editor'),
            'id_issue' => $this->request->getPost('id_issue'),
            'id_status' => $this->request->getPost('id_status'),
            'tanggal_submit' => $this->request->getPost('tanggal_submit'),
        ];

        if ($this->submitModel->insert($data)) {
            return $this->respondCreated($data);
        }
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_artikel' => 'required',
            'id_editor' => 'required',
            'id_issue' => 'required',
            'id_status' => 'required',
            'tanggal_submit' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $data = [
            'id_artikel' => $this->request->getPost('id_artikel'),
            'id_editor' => $this->request->getPost('id_editor'),
            'id_issue' => $this->request->getPost('id_issue'),
            'id_status' => $this->request->getPost('id_status'),
            'tanggal_submit' => $this->request->getPost('tanggal_submit'),
        ];

        if ($this->submitModel->update($id, $data)) {
            return $this->respondUpdated($data);
        }
    }

    public function delete($id = null)
    {
        $submit = $this->submitModel->find($id);
        if (!$submit) {
            return $this->failNotFound('Submit not found');
        }

        if ($this->submitModel->delete($id)) {
            return $this->respondDeleted($submit);
        }
    }
}
