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
	public function tongketthang()
	{
		return view('user.director.tongket'); 
	}
	public function sec_khlhang_index()
	{
		return view('user.secrectary.khlhang_home');
	}
	public function sec_tuchthanh_index()
	{
		return view('user.secrectary.tuchthanh_home');
	}
	public function sec_tudhthanh_index()
	{
		return view('user.secrectary.tudhthanh_home');
	}
	public function sec_tucqtoan_index()
	{
		return view('user.secrectary.tucqtoan_home');
	}
	public function sec_tuclhang_index()
	{
		return view('user.secrectary.tuclhang_home');
	}
	public function checkKHLH($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->check = true;
		$khlh->save();
		return 'Check Success';
	}
	public function uncheckKHLH($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->check = false;
		$khlh->save();
		return 'Uncheck Success';
	}
	public function checkTU($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->secrectary_check_tu = true;
		$khlh->save();
		return 'Check tam ung Success';
	}
	public function uncheckTU($id)
	{
		$khlh = Dntung::findOrFail($id);
		$khlh->secrectary_check_tu = false;
		$khlh->save();
		return 'Uncheck  tam ung Success';
	}
	public function kiemtra(Request $request)
	{
		$id = $request->get('id');
		if($id == null){
			return 'null';
		}else {
			$dntung = \App\Dntung::findOrFail($id);
			$dntung->check = true;
			$dntung->save();
			return 'Da kiem tra';
		}
	}
}
