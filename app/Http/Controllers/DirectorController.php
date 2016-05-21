<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;

class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
	public function direc_tucduyet_index()
	{
		return view('user.director.tucduyet_home');
	}
	public function direc_tucqtoan_index()
	{
		return view('user.director.tucqtoan_home');
	}
	public function direc_tudhthanh_index()
	{
		return view('user.director.tudhthanh_home');
	}
}
