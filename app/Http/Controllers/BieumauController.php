<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BieumauController extends Controller
{
	public function phieuchi()
	{
		return view('bieumau.phieuchi');
	}
}
