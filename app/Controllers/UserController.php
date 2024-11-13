<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class UserController extends ResourceController
{
    use ResponseTrait;

    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();

    }

    // Login view
    public function index()
    {
        return view('login_view');
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
        $user_model = new UserModel();
        $data = [
            'iduser' => $this->request->getVar('iduser'),
            'namauser' => $this->request->getVar('namauser'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getVar('level'),
        ];

        if ($user_model->insert($data)) {
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
            return $this->fail($user_model->errors());
        }
    }

    // Authenticate user
    public function auth()
    {
        $user_model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $user_model->getWhere(['username' => $username, 'password' => $password])->getResult();
        $response = [
            'status' => 200,
            'error' => null,
            'message' => [
                'success' => 'Login succes',
                'data' => $data
            ]
        ];
        if($data){

            //set session
            $session = session();
            $session->set('iduser', $data[0]->iduser);
            $session->set('namauser', $data[0]->namauser);
            $session->set('username', $data[0]->username);
            $session->set('level', $data[0]->level);

            //printout session with json response
            $response['session'] = $session->get();
            // return $this->respond($response);



            
            return redirect()->to('/dashboard');
            // return $this->respond($response);
        }else{
            //flash message
            return redirect()->to('/login')->with('error', 'Username atau password salah');

        }
    }
    // Logout user
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil logout.');
    }
}