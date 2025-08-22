<?php
require_once '../app/helpers/helper.php'; // Include the helper file

class Tenant extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('M_Users');
        // Check if user is logged in and is a tenant
        if (!isLoggedIn() || $_SESSION['user_type'] !== 'tenant') {
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
            'title' => 'Tenant Dashboard - TenantHub',
            'page' => 'dashboard',
            'user_name' => $_SESSION['user_name'],
            'stats' => [
                'active_bookings' => 2,
                'pending_payments' => 1,
                'open_issues' => 0,
                'total_reviews' => 5
            ],
            'recent_notifications' => [
                ['message' => 'Rent payment due in 3 days', 'type' => 'warning', 'time' => '2 hours ago'],
                ['message' => 'Maintenance request approved', 'type' => 'success', 'time' => '1 day ago'],
                ['message' => 'New property available in your area', 'type' => 'info', 'time' => '2 days ago']
            ]
        ];
        $this->view('tenant/v_dashboard', $data);
    }

    public function search_properties()
    {
        $data = [
            'title' => 'Search Properties - TenantHub',
            'page' => 'search_properties',
            'user_name' => $_SESSION['user_name'],
            'properties' => [
                [
                    'id' => 1,
                    'title' => 'Oak Street Apartment',
                    'location' => 'Downtown',
                    'type' => 'Apartment',
                    'price' => 1200,
                    'availability' => 'available',
                    'image' => '/placeholder.svg?height=300&width=400',
                    'features' => ['2 Bedrooms', '1 Bathroom', 'Parking', 'Furnished']
                ],
                [
                    'id' => 2,
                    'title' => 'Maple Avenue Studio',
                    'location' => 'Midtown',
                    'type' => 'Studio',
                    'price' => 800,
                    'availability' => 'available',
                    'image' => '/placeholder.svg?height=300&width=400',
                    'features' => ['1 Bedroom', '1 Bathroom', 'Modern Kitchen']
                ],
                [
                    'id' => 3,
                    'title' => 'Pine Street House',
                    'location' => 'Suburbs',
                    'type' => 'House',
                    'price' => 2500,
                    'availability' => 'reserved',
                    'image' => '/placeholder.svg?height=300&width=400',
                    'features' => ['3 Bedrooms', '2 Bathrooms', 'Garden', 'Garage']
                ],
                [
                    'id' => 4,
                    'title' => 'Cedar Lane Condo',
                    'location' => 'Uptown',
                    'type' => 'Apartment',
                    'price' => 1500,
                    'availability' => 'available',
                    'image' => '/placeholder.svg?height=300&width=400',
                    'features' => ['2 Bedrooms', '2 Bathrooms', 'Balcony', 'Gym Access']
                ]
            ]
        ];
        $this->view('tenant/v_search_properties', $data);
    }

    public function book_property()
    {
        $data = [
            'title' => 'Book Property - TenantHub',
            'page' => 'book_property',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('tenant/v_book_property', $data);
    }

    public function bookings()
    {
        $data = [
            'title' => 'My Bookings - TenantHub',
            'page' => 'bookings',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('tenant/v_bookings', $data);
    }

    public function pay_rent()
    {
        $data = [
            'title' => 'Pay Rent - TenantHub',
            'page' => 'pay_rent',
            'user_name' => $_SESSION['user_name'],
            'rent_info' => [
                'property' => 'Oak Street Apartment',
                'amount' => 1200,
                'due_date' => '2024-02-01',
                'status' => 'pending'
            ]
        ];
        $this->view('tenant/v_pay_rent', $data);
    }

    public function agreements()
    {
        $data = [
            'title' => 'Lease Agreements - TenantHub',
            'page' => 'agreements',
            'user_name' => $_SESSION['user_name'],
            'agreements' => [
                [
                    'id' => 1,
                    'property' => 'Oak Street Apartment',
                    'start_date' => '2024-01-01',
                    'end_date' => '2024-12-31',
                    'status' => 'active',
                    'rent' => 1200
                ]
            ]
        ];
        $this->view('tenant/v_agreements', $data);
    }

    public function report_issue()
    {
        $data = [
            'title' => 'Report Issues - TenantHub',
            'page' => 'report_issue',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('tenant/v_report_issue', $data);
    }

    public function track_issues()
    {
        $data = [
            'title' => 'Track Issue Status - TenantHub',
            'page' => 'track_issues',
            'user_name' => $_SESSION['user_name'],
            'issues' => [
                [
                    'id' => 1,
                    'title' => 'Leaky Faucet in Kitchen',
                    'status' => 'in_progress',
                    'priority' => 'medium',
                    'created_at' => '2024-01-15',
                    'description' => 'Kitchen faucet has been leaking for 2 days'
                ],
                [
                    'id' => 2,
                    'title' => 'Heating System Not Working',
                    'status' => 'resolved',
                    'priority' => 'high',
                    'created_at' => '2024-01-10',
                    'description' => 'Heating system stopped working completely'
                ]
            ]
        ];
        $this->view('tenant/v_track_issues', $data);
    }

    public function my_reviews()
    {
        $data = [
            'title' => 'My Reviews - TenantHub',
            'page' => 'my_reviews',
            'user_name' => $_SESSION['user_name'],
            'reviews' => [
                [
                    'id' => 1,
                    'property' => 'Oak Street Apartment',
                    'rating' => 5,
                    'comment' => 'Great location and well-maintained property',
                    'date' => '2024-01-10'
                ]
            ]
        ];
        $this->view('tenant/v_my_reviews', $data);
    }

    public function notifications()
    {
        $data = [
            'title' => 'Notifications - TenantHub',
            'page' => 'notifications',
            'user_name' => $_SESSION['user_name'],
            'notifications' => [
                [
                    'id' => 1,
                    'title' => 'Rent Payment Reminder',
                    'message' => 'Your rent payment is due in 3 days',
                    'type' => 'warning',
                    'read' => false,
                    'created_at' => '2024-01-28 10:00:00'
                ],
                [
                    'id' => 2,
                    'title' => 'Maintenance Update',
                    'message' => 'Your maintenance request has been approved and scheduled',
                    'type' => 'success',
                    'read' => true,
                    'created_at' => '2024-01-27 14:30:00'
                ],
                [
                    'id' => 3,
                    'title' => 'New Property Available',
                    'message' => 'A new property matching your preferences is now available',
                    'type' => 'info',
                    'read' => true,
                    'created_at' => '2024-01-26 09:15:00'
                ]
            ]
        ];
        $this->view('tenant/v_notifications', $data);
    }

    public function feedback()
    {
        $data = [
            'title' => 'Feedback - TenantHub',
            'page' => 'feedback',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('tenant/v_feedback', $data);
    }

    public function settings()
    {
        $data = [
            'title' => 'Settings - TenantHub',
            'page' => 'settings',
            'user_name' => $_SESSION['user_name']
        ];
        $this->view('tenant/v_settings', $data);
    }
}
