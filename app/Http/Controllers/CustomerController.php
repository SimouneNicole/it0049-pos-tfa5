<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display the customer accounts directory populated from a static in-memory array.
     */
    public function index(): View
    {
        $customers = [
            [
                'fullName'  => 'Eleanor Vance',
                'full_name' => 'Eleanor Vance',
                'email'     => 'eleanor.vance@example.com',
                'phone'     => '+1 (555) 234-5678',
            ],
            [
                'fullName'  => 'Marcus Thorne',
                'full_name' => 'Marcus Thorne',
                'email'     => 'marcus.thorne@example.com',
                'phone'     => '+1 (555) 345-6789',
            ],
            [
                'fullName'  => 'Sophia Sterling',
                'full_name' => 'Sophia Sterling',
                'email'     => 'sophia.sterling@example.com',
                'phone'     => '+1 (555) 456-7890',
            ],
            [
                'fullName'  => 'Lucas Gallagher',
                'full_name' => 'Lucas Gallagher',
                'email'     => 'lucas.gallagher@example.com',
                'phone'     => '+1 (555) 567-8901',
            ],
            [
                'fullName'  => 'Clara Delgado',
                'full_name' => 'Clara Delgado',
                'email'     => 'clara.delgado@example.com',
                'phone'     => '+1 (555) 678-9012',
            ],
            [
                'fullName'  => 'Julian Hayes',
                'full_name' => 'Julian Hayes',
                'email'     => 'julian.hayes@example.com',
                'phone'     => '+1 (555) 789-0123',
            ],
        ];

        return view('customers.index', [
            'title'      => 'Customer Accounts',
            'activePage' => 'customers',
            'customers'  => $customers,
        ]);
    }
}
