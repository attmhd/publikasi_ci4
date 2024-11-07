<?php 

namespace App\Controllers;

use App\Models\EditorModel as Editor;
use CodeIgniter\RESTful\ResourceController;

class EditorController extends ResourceController
{


    public function __construct()
    {
        $this->model = new Editor();
        
    }

    public function index()
    {
        $data = [
            'detail_editor' => $this->model->orderBy('id_editor', 'ASC')->paginate(5),
            'pager' => $this->model->pager,
        ];

        return view('editor/index', $data);
    }

    public function add_form()
    {
        return view('editor/add_form');
    }

    public function edit($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Editor not found');
        }
        return view('editor/edit_form', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_editor' => 'required',
            'nama_editor' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'id_editor' => $this->request->getPost('id_editor'),
            'nama_editor' => $this->request->getPost('nama_editor'),
        ];

        if ($this->model->insert($data)) {
            session()->setFlashdata('message', 'Editor berhasil ditambahkan');
            return redirect()->to('/dashboard/editor');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
    }

    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_editor' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_editor' => $this->request->getPost('nama_editor'),
        ];

        if ($this->model->update($id, $data)) {
            session()->setFlashdata('message', 'Editor berhasil diubah');
            return redirect()->to('/dashboard/editor');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }
    }

    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            if ($this->model->delete($id)) {
                session()->setFlashdata('message', 'Editor berhasil dihapus');
                return redirect()->to('/dashboard/editor');
            } else {
                return $this->failServerError('Failed to delete the editor');
            }
        } else {
            return $this->failNotFound('Editor not found');
        }
    }
}