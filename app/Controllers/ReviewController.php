<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ReviewModel;
use App\Models\SubmitModel;
use App\Models\EditorModel;
use App\Models\ReviewerModel;
use App\Models\StatusModel;
use App\Models\ReviewViewModel;

class ReviewController extends ResourceController
{
    protected $reviewModel;
    protected $submitModel;
    protected $editorModel;
    protected $reviewerModel;
    protected $statusModel;
    protected $reviewViewModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
        $this->submitModel = new SubmitModel();
        $this->editorModel = new EditorModel();
        $this->reviewerModel = new ReviewerModel();
        $this->statusModel = new StatusModel();
        $this->reviewViewModel = new ReviewViewModel();
    }

    public function index()
    {
        $data = [
            'review' => $this->reviewViewModel->orderBy('id_review', 'ASC')->paginate(5),
            'pager' => $this->reviewViewModel->pager,
        ];

        // return $this->respond($data);
        return view('review/index', $data);
    }

    public function add_form()
    {
        $data = [
            'submit' => $this->submitModel->findAll(),
            'editor' => $this->editorModel->findAll(),
            'reviewer' => $this->reviewerModel->findAll(),
            'status' => $this->statusModel->findAll(),
        ];

        // return $this->respond($data);
        return view('review/add_form', $data);
    }

    public function edit($id = null)
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

        // return $this->respond($data);
        return view('review/edit_form', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_submit' => 'required',
            'id_editor' => 'required',
            'id_reviewer' => 'required',
            'tgl_penugasan_reviewer' => 'required',
            'id_status' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $this->request->getPost([
             'id_submit', 'id_editor', 'id_reviewer', 'tgl_penugasan_reviewer' ,'id_status'
        ]);

        if ($this->reviewModel->insert($data)) {
            session()->setFlashdata('message', 'Data berhasil disimpan');
            return redirect()->to('/dashboard/review');
        }
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_submit' => 'required',
            'id_editor' => 'required',
            'id_reviewer' => 'required',
            'tgl_penugasan_reviewer' => 'required',
            'id_status' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = $this->request->getPost([
            'id_submit', 'id_editor', 'id_reviewer', 'tgl_penugasan_reviewer' ,'id_status'
        ]);

        if ($this->reviewModel->update($id, $data)) {
            session()->setFlashdata('message', 'Data berhasil diupdate');
            return redirect()->to('/dashboard/review');
        }
    }

    public function delete($id = null)
    {
        $review = $this->reviewModel->find($id);
        if ($review) {
            $this->reviewModel->delete($id);
            session()->setFlashdata('message', 'Data berhasil dihapus');
            return redirect()->to('/dashboard/review');
        }

        return $this->failNotFound('Review not found');
    }
}
