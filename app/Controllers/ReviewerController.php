<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ReviewerModel;

class ReviewerController extends ResourceController
{

    protected $reviewerModel;
    protected $session;

    public function __construct()
    {
        $this->reviewerModel = new ReviewerModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'reviewer' => $this->reviewerModel->orderBy('id_reviewer', 'ASC')->paginate(5),
            'pager' => $this->reviewerModel->pager,
        ];

        return $this->respond($data);
    }

    public function add_form()
    {
        return view('reviewer/add_form');
    }

    public function edit_form($id = null)
    {
        $data = $this->reviewerModel->find($id);
        if (!$data) {
            $this->session->setFlashdata('error', 'Reviewer not found');
            return redirect()->to(base_url('reviewer'));
        }
        return view('reviewer/edit_form', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_reviewer' => 'required',
            'nama_reviewer' => 'required',
            'email_reviewer' => 'required',
            'password_reviewer' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'id_reviewer' => $this->request->getPost('id_reviewer'),
            'nama_reviewer' => $this->request->getPost('nama_reviewer'),
            'email_reviewer' => $this->request->getPost('email_reviewer'),
            'password_reviewer' => $this->request->getPost('password_reviewer'),
        ];

        if ($this->reviewerModel->insert($data)) {
            $this->session->setFlashdata('success', 'Reviewer added successfully');
            return redirect()->to(base_url('reviewer'));
        } else {
            $this->session->setFlashdata('error', 'Failed to add reviewer');
            return redirect()->back()->withInput();
        }
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_reviewer' => 'required',
            'nama_reviewer' => 'required',
            'email_reviewer' => 'required',
            'password_reviewer' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'id_reviewer' => $this->request->getPost('id_reviewer'),
            'nama_reviewer' => $this->request->getPost('nama_reviewer'),
            'email_reviewer' => $this->request->getPost('email_reviewer'),
            'password_reviewer' => $this->request->getPost('password_reviewer'),
        ];

        if ($this->reviewerModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Reviewer updated successfully');
            return redirect()->to(base_url('reviewer'));
        } else {
            $this->session->setFlashdata('error', 'Failed to update reviewer');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id = null)
    {
        $data = $this->reviewerModel->find($id);
        if ($data) {
            $this->reviewerModel->delete($id);
            $this->session->setFlashdata('success', 'Reviewer deleted successfully');
        } else {
            $this->session->setFlashdata('error', 'Reviewer not found');
        }
        return redirect()->to(base_url('reviewer'));
    }
}
