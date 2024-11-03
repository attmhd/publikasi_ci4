<?php

namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use App\Models\Artikel;

class ArtikelController extends ResourceController
{

    protected $artikelModel;

    public function __construct()
    {
        $this->artikelModel = new Artikel();
    }

    public function index()
    {
        $data = [
            'artikel' => $this->artikelModel->paginate(5),
            'pager' => $this->artikelModel->pager,
        ];

        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Artikel found',
                'data' => $data
            ],
        ];

        return $this->respond($response);
    }

    public function add_form()
    {
        return $this->respond("Halaman tambah artikel");
    }

    public function edit($id = null)
    {
        $data = $this->artikelModel->find($id);
        if (!$data)
        {
            return $this->fail('Artikel not found', 404);
        }

        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Artikel found',
                'data' => $data
            ],
        ];

        return $this->respond($response);
    }

    public function create()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id_artikel' => 'required',
            'judul_artikel' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid)
        {
            $this->artikelModel->insert([
                'id_artikel' => $this->request->getVar('id_artikel'),
                'judul_artikel' => $this->request->getVar('judul_artikel'),
            ]);

            $response = [
                'status' => 201,
                'error' => null,
                'message' => [
                    'success' => 'Artikel created'
                ]
            ];

            return $this->respondCreated($response);
        }
        else
        {
            return $this->fail($validation->getErrors());
        }
     
    }

    public function update($id = null)
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'judul_artikel' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid)
        {
            $this->artikelModel->update($id, [
                'judul_artikel' => $this->request->getVar('judul_artikel'),
            ]);

            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'success' => 'Artikel updated'
                ]
            ];

            return $this->respond($response);
        }
        else
        {
            return $this->fail($validation->getErrors());
        }
    }

    public function delete($id = null)
    {
        $data = $this->artikelModel->find($id);
        if (!$data)
        {
            return $this->fail('Artikel not found', 404);
        }

        $this->artikelModel->delete($id);

        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Artikel deleted'
            ]
        ];

        return $this->respondDeleted($response);
    }

}
