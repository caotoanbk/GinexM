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
	public function qtlhang($id)
	{
		$dntung = Dntung::findOrFail($id);
		$qtconts = $dntung->qtconts()->get()->toArray();
		$qtpsinh = $dntung->qtoans()->get()->toArray();
		return view('user.secrectary_qtoan', compact('dntung', 'qtconts', 'qtpsinh'));
	}
}
