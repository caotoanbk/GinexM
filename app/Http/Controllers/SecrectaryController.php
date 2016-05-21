<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dntung;
use App\Qtoan;
use App\QTCont;

class SecrectaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function qtlhang($id)
	{
		$dntung = Dntung::findOrFail($id);
		$qtconts = $dntung->qtconts()->get()->toArray();
		$qtpsinh = $dntung->qtoans()->get()->toArray();
		return view('user.secrectary_qtoan', compact('dntung', 'qtconts', 'qtpsinh'));
	}
	public function sec_tuchthanh_index()
	{
		return view('user.secrectary.tuchthanh_home');
	}
	public function sec_tudhthanh_index()
	{
		return view('user.secrectary.tudhthanh_home');
	}
}
