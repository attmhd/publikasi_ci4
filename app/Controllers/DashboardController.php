<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Start session
        $session = session();

        // Prepare data for the view
        $data = [
            'title' => 'Dashboard',
            'session' => $session->get()
        ];

        // Load the view with data
        return view('dashboard_view', $data);
    }
}
