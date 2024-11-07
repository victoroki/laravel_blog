<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * This ensures that only authenticated users can access the controller methods.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home'); // Your home view file
    }
}
