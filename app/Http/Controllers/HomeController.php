<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$identify=\Auth::user()->email;
		if ($identify == 'tony.cao@ginex.com.vn') {
			return view('proponent_home');
		}
		return 'Hello world';
		
    }
}
