<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

// import model
use App\Models\AuthorView;
use App\Models\AuthorModel;

class Author extends ResourceController
{
    protected $authorView;
    protected $authorModel;

    public function __construct()
    {
        $this->authorView = new AuthorView();
        $this->authorModel = new AuthorModel();
    }

    public function index()
    {
        $data = [
            'authors' => $this->authorView->paginate(5),
            'pager' => $this->authorView->pager,
        
        ];

        return $this->response->setJSON($data);
    }

    public function add_form()
    {
        return $this->response->setJSON("test");
    }

    public function edit($id = null)
    {
        $data = $this->authorModel->find($id);
        if (!$data)
        {
            return $this->fail('Author not found', 404);
        }

        return $this->response->setJSON($data);
    }


    public function create()
    {
        $data = $this->request->getJSON();
        $this->authorModel->insert($data);
        return $this->response->setJSON($data);
    }
    
    public function update($id = null)
    {
        $data = $this->request->getJSON();
        $this->authorModel->update($id, $data);
        return $this->response->setJSON($data);
    }

    public function delete($id = null)
    {
        $data = $this->authorModel->find($id);
        if (!$data)
        {
            return $this->failNotFound('Author not found');
        }
        $this->authorModel->delete($id);
        return $this->response->setJSON($data);
    }



}
