<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dntung;
use Carbon\Carbon;

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
		$dntu->date_done = Carbon::now(); 
		$dntu->save();
		return redirect('/');
	}
	public function tongketthang()
	{
		return view('user.director.tongket'); 
	}
	public function xulytongket(Request $request)
	{
		$my = $request->input('month_tket');
		$arr = explode('-', $my);
		$month = intval($arr[1]);
		$year = intval($arr[0]);
		return view('user.director.tongket_tamung', compact('month', 'year'));
	}
	public function qtlhang($id)
	{
		$dntung = Dntung::findOrFail($id);
		$qtconts = $dntung->qtconts()->get()->toArray();
		$qtpsinh = $dntung->qtoans()->get()->toArray();
		return view('user.director_qtoan', compact('dntung', 'qtconts', 'qtpsinh'));
	}
	public function approveKHLH($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->approve = true;
		$khlh->save();
		return "Approve success";
	}
	public function unapproveKHLH($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->approve = false;
		$khlh->save();
		return "Unapprove success";
	}
	public function direc_khlhang_index()
	{
		return view('user.director.khlhang_home');
	}
	public function direc_dntung_index()
	{
		return view('user.director.dntung_home');
	}
	public function direc_tucqtoan_index()
	{
		return view('user.director.tucqtoan_home');
	}
	public function direc_tudhthanh_index()
	{
		return view('user.director.tudhthanh_home');
	}
	public function direc_tuclhang_index()
	{
		return view('user.director.tuclhang_home');
	}
}
