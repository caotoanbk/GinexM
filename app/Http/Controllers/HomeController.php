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
		$identify=\Auth::user()->type;
		if ($identify == 0) {
			return view('proponent_home');
		}else if ($identify == 1){
			return view('secrectary_home');
		}else if ($identify == 2){
			return view('director_home');
		}

		return 'Nguoi dung khong hop le';
    }
}
