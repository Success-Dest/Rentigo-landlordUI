<?php
require_once '../app/helpers/helper.php'; // Include the helper file

class Manager extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('M_Users');
        // Check if user is logged in and is a property manager
        if (!isLoggedIn() || $_SESSION['user_type'] !== 'property_manager') {
            redirect('users/login');
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Property Manager Dashboard',
            'page' => 'dashboard',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_dashboard', $data);
    }

    public function properties()
    {
        $data = [
            'title' => 'Property Management',
            'page' => 'properties',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_properties', $data);
    }

    public function tenants()
    {
        $data = [
            'title' => 'Tenant Management',
            'page' => 'tenants',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_tenants', $data);
    }

    public function maintenance()
    {
        $data = [
            'title' => 'Maintenance Management',
            'page' => 'maintenance',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_maintenance', $data);
    }

    public function inspections()
    {
        $data = [
            'title' => 'Property Inspections',
            'page' => 'inspections',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_inspections', $data);
    }

    public function issues()
    {
        $data = [
            'title' => 'Issue Tracking',
            'page' => 'issues',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_issues', $data);
    }

    public function leases()
    {
        $data = [
            'title' => 'Lease Agreements',
            'page' => 'leases',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_leases', $data);
    }

    public function providers()
    {
        $data = [
            'title' => 'Service Providers',
            'page' => 'providers',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('manager/v_providers', $data);
    }
}
