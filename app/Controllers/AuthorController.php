<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Session\Session;

// import model
use App\Models\AuthorView;
use App\Models\AuthorModel;

class AuthorController extends ResourceController
{
    protected $authorView;
    protected $authorModel;
    protected $session;

    public function __construct()
    {
        $this->authorView = new AuthorView();
        $this->authorModel = new AuthorModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'authors' => $this->authorView->paginate(5),
            'pager' => $this->authorView->pager,
        ];

        $response = [
            'status' => 200,
            'error' => null,
            'data' => $data
        ];

        return $this->response->setJSON($response);
    }

    public function add_form()
    {
        return $this->response->setJSON("Halaman tambah author");
    }

    public function edit($id = null)
    {
        $data = $this->authorModel->find($id);
        if (!$data)
        {
            return $this->fail('Author not found', 404);
        }

        $response = [
            'status' => 200,
            'error' => null,
            'data' => $data
        ];

        return $this->response->setJSON($response);
    }

    public function create()
    {
        $data = $this->request->getJSON();
        $this->authorModel->insert($data);

        // return response with 201 status code if success
        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'Author created'
            ]
        ];  

        // if failed return response with 500 status code
        if (!$response)
        {
            return $this->fail($response, 500);
        }

        // Set flash message
        $this->session->setFlashdata('success', 'Author created successfully.');

        return $this->response->setJSON($response, 201);
    }
    
    public function update($id = null)
    {
        $data = $this->request->getJSON();
        $this->authorModel->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Author updated'
            ]
        ];

        // Set flash message
        $this->session->setFlashdata('success', 'Author updated successfully.');

        return $this->response->setJSON($response);
    }

    public function delete($id = null)
    {
        $data = $this->authorModel->find($id);
        if (!$data)
        {
            return $this->failNotFound('Author not found');
        }
        $this->authorModel->delete($id);

        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Author deleted'
            ]
        ];

        // Set flash message
        $this->session->setFlashdata('success', 'Author deleted successfully.');

        return $this->response->setJSON($response);
    }
}