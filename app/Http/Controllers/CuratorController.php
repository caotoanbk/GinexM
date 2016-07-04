<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CuratorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function cur_tucktra_index()
	{
		return view('user.curator.tucktra_home');
	}
}
