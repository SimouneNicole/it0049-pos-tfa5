<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display the user accounts registry populated from a static in-memory array.
     */
    public function index(): View
    {
        $users = [
            [
                'username'  => 'clara.delgado',
                'fullName'  => 'Clara Delgado',
                'full_name' => 'Clara Delgado',
                'role'      => 'System Administrator',
            ],
            [
                'username'  => 'marcus.thorne',
                'fullName'  => 'Marcus Thorne',
                'full_name' => 'Marcus Thorne',
                'role'      => 'Store Manager',
            ],
            [
                'username'  => 'eleanor.vance',
                'fullName'  => 'Eleanor Vance',
                'full_name' => 'Eleanor Vance',
                'role'      => 'Head Cashier',
            ],
            [
                'username'  => 'lucas.gallagher',
                'fullName'  => 'Lucas Gallagher',
                'full_name' => 'Lucas Gallagher',
                'role'      => 'Cashier',
            ],
            [
                'username'  => 'sophia.sterling',
                'fullName'  => 'Sophia Sterling',
                'full_name' => 'Sophia Sterling',
                'role'      => 'Inventory Specialist',
            ],
            [
                'username'  => 'julian.hayes',
                'fullName'  => 'Julian Hayes',
                'full_name' => 'Julian Hayes',
                'role'      => 'Cashier',
            ],
        ];

        return view('users.index', [
            'title'      => 'User Accounts',
            'activePage' => 'users',
            'users'      => $users,
        ]);
    }
}
