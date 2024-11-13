<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SubmitModel;
use App\Models\ArtikelModel;
use App\Models\EditorModel;
use App\Models\IssueModel;
use App\Models\StatusModel;
use App\Models\SubmitViewModel;

class SubmitController extends ResourceController
{
    protected $submitModel;
    protected $artikelModel;
    protected $editorModel;
    protected $issueModel;
    protected $statusModel;
    protected $submitViewModel;
    protected $session;

    public function __construct()
    {
        $this->submitModel = new SubmitModel();
        $this->artikelModel = new ArtikelModel();
        $this->editorModel = new EditorModel();
        $this->issueModel = new IssueModel();
        $this->statusModel = new StatusModel();
        $this->submitViewModel = new SubmitViewModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'submit' => $this->submitViewModel->orderBy('id_submit', 'ASC')->paginate(5),
            'pager' => $this->submitViewModel->pager,
        ];

        return view('submit/index', $data);
    }

    public function add_form()
    {
        $data = [
            'artikel' => $this->artikelModel->findAll(),
            'editor' => $this->editorModel->findAll(),
            'issue' => $this->issueModel->findAll(),
            'status' => $this->statusModel->findAll(),
        ];

        // return $this->respond($data);
        return view('submit/add_form', $data);
    }

    public function edit($id = null)
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

        // return $this->respond($data);
        return view('submit/edit_form', $data);
    }

    public function create()
    {
        $data = [
            'id_submit' => $this->request->getPost('id_submit'),
            'tgl_submit' => $this->request->getPost('tgl_submit'),
            'id_artikel' => $this->request->getPost('id_artikel'),
            'id_editor' => $this->request->getPost('id_editor'),
            'id_issue' => $this->request->getPost('id_issue'),
            'id_status' => $this->request->getPost('id_status'),
            'tgl_submit' => $this->request->getPost('tgl_submit'),
            'tgl_penugasan_editor' => $this->request->getPost('tgl_penugasan_editor'),
            'judul_baru' => $this->request->getPost('judul_baru'),
        ];

        if ($this->submitModel->insert($data)) {
            $this->session->setFlashdata('message', 'Submit created successfully.');
            return redirect()->to('/dashboard/submit');
        } else {
            $this->session->setFlashdata('error', 'Failed to create submit.');
            return redirect()->back()->withInput();
        }
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();


        $data = [
            'tgl_submit' => $this->request->getPost('tgl_submit'),
            'id_artikel' => $this->request->getPost('id_artikel'),
            'id_editor' => $this->request->getPost('id_editor'),
            'id_issue' => $this->request->getPost('id_issue'),
            'id_status' => $this->request->getPost('id_status'),
            'tgl_submit' => $this->request->getPost('tgl_submit'),
            'tgl_penugasan_editor' => $this->request->getPost('tgl_penugasan_editor'),
            'judul_baru' => $this->request->getPost('judul_baru'),
        ];

        if ($this->submitModel->update($id, $data)) {
            $this->session->setFlashdata('message', 'Submit updated successfully.');
            return redirect()->to('/dashboard/submit');
        } else {
            $this->session->setFlashdata('error', 'Failed to update submit.');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id = null)
    {
        $submit = $this->submitModel->find($id);
        if (!$submit) {
            return $this->failNotFound('Submit not found');
        }

        if ($this->submitModel->delete($id)) {
            $this->session->setFlashdata('message', 'Submit deleted successfully.');

            return redirect()->to('/dashboard/submit');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete submit.');
            return redirect()->back();
        }
    }
}
