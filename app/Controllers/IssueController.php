<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\IssueModel as Issue;

class IssueController extends ResourceController
{
    protected $issue;
    protected $session;

    public function __construct()
    {
        $this->issue = new Issue();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = $this->issue->orderBy('id_issue', 'ASC')->paginate(5);

        return view('issue/index', [
            'data' => $data,
            'pager' => $this->issue->pager
        ]);
    }

    public function add_form()
    {
        return view('issue/add_form');
    }

    public function create()
    {
        $data = [
            "id_issue" => $this->request->getPost('id_issue'),
            "nama_issue" => $this->request->getPost('nama_issue')
        ];

        if ($this->issue->insert($data)) {
            $this->session->setFlashdata('message', 'Data berhasil ditambahkan');
            return redirect()->to('/dashboard/issue');
        }
    }

    public function edit($id = null)
    {
        $data = $this->issue->find($id);

        if ($data) {
            return view('issue/edit_form', $data);
        } else {
            $this->session->setFlashdata('error', 'Data tidak ditemukan dengan id ' . $id);
            return redirect()->to('/dashboard/issue');
        }
    }

    public function update($id = null)
    {
        $input = $this->request->getPost();
        $data = [
            'nama_issue' => $input['nama_issue'],
        ];

        if ($this->issue->update($id, $data)) {
            $this->session->setFlashdata('message', 'Data berhasil diupdate');
            return redirect()->to('/dashboard/issue');
        }
    }

    public function delete($id = null)
    {
        $data = $this->issue->find($id);
        if ($data) {
            $this->issue->delete($id);
            $this->session->setFlashdata('message', 'Data berhasil dihapus');
            return redirect()->to('/dashboard/issue');
        } else {
            $this->session->setFlashdata('error', 'Data dengan ID ' . $id . ' tidak ditemukan');
            return redirect()->to('/dashboard/issue');
        }
    }
}
