<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ReviewModel;
use App\Models\SubmitModel;
use App\Models\EditorModel;
use App\Models\ReviewerModel;
use App\Models\StatusModel;

class ReviewController extends ResourceController
{
    protected $reviewModel;
    protected $submitModel;
    protected $editorModel;
    protected $reviewerModel;
    protected $statusModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
        $this->submitModel = new SubmitModel();
        $this->editorModel = new EditorModel();
        $this->reviewerModel = new ReviewerModel();
        $this->statusModel = new StatusModel();
    }

    public function index()
    {
        $data = [
            'review' => $this->reviewModel->orderBy('id_review', 'ASC')->paginate(5),
            'pager' => $this->reviewModel->pager,
        ];

        return $this->respond($data);
    }

    public function add_form()
    {
        $data = [
            'submit' => $this->submitModel->findAll(),
            'editor' => $this->editorModel->findAll(),
            'reviewer' => $this->reviewerModel->findAll(),
            'status' => $this->statusModel->findAll(),
        ];

        return $this->respond($data);
    }

    public function edit_form($id = null)
    {
        $review = $this->reviewModel->find($id);
        if (!$review) {
            return $this->failNotFound('Review not found');
        }

        $data = [
            'review' => $review,
            'submit' => $this->submitModel->findAll(),
            'editor' => $this->editorModel->findAll(),
            'reviewer' => $this->reviewerModel->findAll(),
            'status' => $this->statusModel->findAll(),
        ];

        return $this->respond($data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_review' => 'required',
            'id_submit' => 'required',
            'id_editor' => 'required',
            'id_reviewer' => 'required',
            'id_status' => 'required',
            'review' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $this->request->getPost([
            'id_review', 'id_submit', 'id_editor', 'id_reviewer', 'id_status', 'review'
        ]);

        if ($this->reviewModel->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to('/review');
        }
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_submit' => 'required',
            'id_editor' => 'required',
            'id_reviewer' => 'required',
            'id_status' => 'required',
            'review' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $this->request->getPost([
            'id_submit', 'id_editor', 'id_reviewer', 'id_status', 'review'
        ]);

        if ($this->reviewModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to('/review');
        }
    }

    public function delete($id = null)
    {
        $review = $this->reviewModel->find($id);
        if ($review) {
            $this->reviewModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return $this->respondDeleted(['message' => 'Data berhasil dihapus']);
        }

        return $this->failNotFound('Review not found');
    }
}
