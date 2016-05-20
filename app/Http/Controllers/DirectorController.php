<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;

class DirectorController extends Controller
{
	public function duyet(Request $request)
	{

		$id = $request->get('id');
		if($id == null){
			return 'null';
		}else{
			$dntung = \App\Dntung::findOrFail($id);
			$dntung->approve = true;
			$dntung->save();
			return 'Success';
		}
	}
	public function hoanthanh($id)
	{
		$dntu = Dntung::findOrFail($id);
		$dntu->done=true;
		$dntu->save();
		redirect('home');
	}
	public function qtlhang($id)
	{
		$dntung = Dntung::findOrFail($id);
		$qtconts = $dntung->qtconts()->get()->toArray();
		$qtpsinh = $dntung->qtoans()->get()->toArray();
		return view('user.director_qtoan', compact('dntung', 'qtconts', 'qtpsinh'));
	}
}
