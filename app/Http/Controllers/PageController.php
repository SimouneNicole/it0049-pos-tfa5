<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the home/overview landing page.
     */
    public function home(): View
    {
        return view('pages.home', [
            'title'      => 'Point of Sale',
            'activePage' => 'home',
        ]);
    }

    /**
     * Display the about/platform specification page.
     */
    public function about(): View
    {
        return view('pages.about', [
            'title'      => 'About',
            'activePage' => 'about',
        ]);
    }
}
