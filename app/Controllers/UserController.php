<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\UserModel as User;    

class UserController extends ResourceController
{
    use ResponseTrait;

    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new User();
        $this->session = \Config\Services::session();
    }

    // Login view
    public function index()
    {
        // return view('login_view');
        return $this->respond('login_view');
    }

    // Register view
    public function register_view()
    {
        return view('register_view');
    }

    // Get user by ID
    public function show($id = null)
    {
        $data = $this->userModel->find($id);
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('User tidak ditemukan');
        }
    }

    // Create user
    public function register()
    {
        $data = [
            'iduser' => $this->request->getVar('iduser'),
            'namauser' => $this->request->getVar('namauser'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getVar('level'),
        ];

        if ($this->userModel->insert($data)) {
            $response = [
                'status' => 201,
                'error' => null,
                'message' => [
                    'success' => 'User berhasil ditambahkan',
                    'data' => $data
                ]
            ];
            return $this->respondCreated($response);
        } else {
            return $this->fail($this->userModel->errors());
        }
    }

    // Authenticate user
    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session
            $this->session->set([
                'iduser' => $user['iduser'],
                'namauser' => $user['namauser'],
                'username' => $user['username'],
                'level' => $user['level']
            ]);

            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Username atau password salah');
        }
    }

    // Logout user
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
